var jqac = jQuery;
(function (a) {
	a.chat2 = function () {
		var Z;
		var $body = a('body');
		var BLHT;
		var	buddylistreceived;
		var	$tooltip = null;
		var	$tooltip_content;
		var W = false;
		var user_username = {};
			
		function hideTooltip() {
			if ($tooltip) {
				$tooltip.hide();
			}
		}
			
		function showTooltip($target, text, is_left, custom_left, custom_top, is_sideways) {
			if ($tooltip === null) {
				$tooltip = a('<div id="chat_tooltip2"><div class="chat_tooltip_content2"></div></div>').appendTo($body);
				$tooltip_content = a('.chat_tooltip_content2', $tooltip);
			}
			$tooltip_content.html(text);
			var target_offset = $target.offset();
			var target_width = $target.width();
			var target_height = $target.height();
			var tooltip_width = $tooltip.width();
			if (!custom_left) {
				custom_left = 0;
			}
			if (!custom_top) {
				custom_top = 0;
			}
			if (is_left) {
				$tooltip.css({
					top				: target_offset.top - a(window).scrollTop() - target_height - 1 - custom_top,
					left			: target_offset.left + target_width - 16 - custom_left,
					display			: "block"
				}).addClass("chat_tooltip_left2");
			} else if (is_sideways) {
				$tooltip.css({
					top				: target_offset.top - a(window).scrollTop() - target_height - 1 - custom_top,
					left			: target_offset.left + target_width - tooltip_width + 18 - custom_left,
					display			: "block",
					'background-position'	: tooltip_width - 128 + "px -60px"
				}).removeClass("chat_tooltip_left2");
			} else {
				$tooltip.css({
					top				: target_offset.top - a(window).scrollTop() - target_height - 1 - custom_top,
					left			: target_offset.left + target_width - tooltip_width + 18 - custom_left,
					display			: "block",
					'background-position'	: tooltip_width - 23 + "px -118px"
				}).removeClass("chat_tooltip_left2");
			}
			if (W) {
				$tooltip.css("position", "absolute");
				$tooltip.css(
					"top", 
					parseInt(a(window).height()) - parseInt($tooltip.css("bottom")) - parseInt($tooltip.height()) + a(window).scrollTop() + "px"
				);
			}
		}
		
		function receiveUserFromUserlist(b) {
			if (a(b).attr("id")) var c = a(b).attr("id").substr(23);
			else var c = "";
			if (c == "") c = a(b).parent().attr("id").substr(23);
			return c;
		}
		
		function loadBuddyList() {
			a.ajax({
				url: c_ac_path + "includes/json/receive/receive_buddylist.php",
				cache: false,
				type: "get",
				dataType: "json",
				success: function (b) {
					var c = {},
						d = "";
					c["available"] = "";
					c["away"] = "";
					var z = 0;
					b && a.each(b, function (i, e) {
						if (i == "buddylist") {
							buddylistreceived = 1;
							a.each(e, function (l, f) {
								if (ac_max_results == 0 || z < ac_max_results) {
									longname = f.n.length > 16 ? f.n.substr(0, 16) + "..." : f.n;

									c[f.s] += '<div id="chat_userlist_pub_' + f.id + '" class="chat_userlist_pub"><img class="chat_userlist_pub_avatar ' + d + '" src="' + f.a + '" width="32" height="32" /></div>';
									
									user_username[f.id] = f.n;
								}
								z++;
							});
						}
						
						if (buddylistreceived == 1) {
							for (buddystatus in c) {
								if (c.hasOwnProperty(buddystatus)) {
									if (c[buddystatus] == "") {
										a("#chat_pub_userslist_" + buddystatus).html("");
									} else {
										a("#chat_pub_userslist_" + buddystatus).html(c[buddystatus]);
									}
								}
							}
							a(".chat_userlist_pub").click(function (l) {
								var id = receiveUserFromUserlist(l.target);
								jqac.chat.chatWith(id);
							});
							a(".chat_userlist_pub").mouseover(function (l) {
								var id = receiveUserFromUserlist(l.target);
								showTooltip(a("#chat_userlist_pub_" + id), user_username[id], 1, 13, -5);
							});
							a(".chat_userlist_pub").mouseout(function (l) {
								hideTooltip();
							});
							buddylistreceived = 0;
						}
					});
				}
			});
			if (typeof c_list_heart_beat != "undefined") {
				var BLHT = c_list_heart_beat * 1000;
			} else {
				var BLHT = 60000;
			}
			Z = setTimeout(function () {
					loadBuddyList()			
				}, BLHT);
		}
	
		function runchat() {
			a("<div/>").attr("id", "chat_pub_userslist_available").appendTo(a("#chat_public_list"));
			a("<div/>").attr("id", "chat_pub_userslist_away").appendTo(a("#chat_public_list"));
			loadBuddyList();
		}
		
		arguments.callee.runchat = runchat;
	}
})(jqac);

jqac(document).ready(function () {
	jqac.chat2();
	jqac.chat2.runchat()
});