"use strict";

function latepoint_is_timeframe_in_periods(e, t, a, o) {
    for (var s = arguments.length > 3 && void 0 !== o && o, n = 0; n < a.length; n++) {
        var i = 0,
            r = 0,
            l = 0,
            c = 0,
            d = a[n].split(":");
        if (2 == d.length ? (i = d[0], r = d[1]) : (l = d[2], c = d[3], i = parseFloat(d[0]) - parseFloat(l), r = parseFloat(d[1]) + parseFloat(c)), s) {
            if (latepoint_is_period_inside_another(e, t, i, r)) return !0
        } else if (latepoint_is_period_overlapping(e, t, i, r)) return !0
    }
    return !1
}

function latepoint_is_period_overlapping(e, t, a, o) {
    return e < o && a < t
}

function latepoint_is_period_inside_another(e, t, a, o) {
    return e >= a && t <= o
}

function latepoint_minutes_to_hours(e) {
    var t = latepoint_is_army_clock(),
        a = Math.floor(e / 60);
    return !t && a > 12 && (a -= 12), a
}

function latepoint_am_or_pm(e) {
    return latepoint_is_army_clock() ? "" : e < 720 ? "am" : "pm"
}

function latepoint_hours_and_minutes_to_minutes(e, t) {
    var a = e.split(":"),
        o = a[0],
        s = a[1];
    return "pm" == t && o < 12 && (o = parseInt(o) + 12), "am" == t && 12 == o && (o = 0), s = parseInt(s) + 60 * o
}

function latepoint_get_time_system() {
    return latepoint_helper.time_system
}

function latepoint_is_army_clock() {
    return "24" == latepoint_get_time_system()
}

function latepoint_minutes_to_hours_and_minutes(e, t) {
    var a = latepoint_is_army_clock(),
        o = arguments.length > 1 && void 0 !== t ? t : "%02d:%02d";
    if (!(e < 1)) {
        var s = Math.floor(e / 60),
            n;
        return !a && s > 12 && (s -= 12), sprintf(o, s, e % 60)
    }
}

function latepoint_generate_form_message_html(e, t) {
    var a = '<div class="os-form-message-w status-' + t + '"><ul>';
    return Array.isArray(e) ? e.forEach(function(e) {
        a += "<li>" + e + "</li>"
    }) : a += "<li>" + e + "</li>", a += "</ul></div>"
}

function latepoint_clear_form_messages(e) {
    e.find(".os-form-message-w").remove()
}

function latepoint_show_data_in_lightbox(e, t) {
    var a = arguments.length > 1 && void 0 !== t ? t : "";
    jQuery(".latepoint-lightbox-w").remove();
    var o = "latepoint-lightbox-w latepoint-w ";
    a && (o += a), jQuery("body").append('<div class="' + o + '"><div class="latepoint-lightbox-i" id="form_booking_tamed">' + e + '<a href="#" class="latepoint-lightbox-close"><i class="latepoint-icon latepoint-icon-x"></i></a></div><div class="latepoint-lightbox-shadow"></div></div>'), jQuery("body").addClass("latepoint-lightbox-active")
}

function latepoint_add_notification(e, t) {
    var a = arguments.length > 1 && void 0 !== t ? t : "success",
        o = jQuery("body").find(".os-notifications");
    o.length || (jQuery("body").append('<div class="os-notifications"></div>'), o = jQuery("body").find(".os-notifications")), o.find(".item").length > 0 && o.find(".item:first-child").remove(), o.append('<div class="item item-type-' + a + '">' + e + '<span class="os-notification-close"><i class="latepoint-icon latepoint-icon-x"></i></span></div>')
}

function latepoint_mask_timefield(e) {
    jQuery().inputmask && e.inputmask({
        alias: "datetime",
        inputFormat: latepoint_is_army_clock() ? "HH:MM" : "hh:MM",
        placeholder: "HH:MM"
    })
}

function latepoint_mask_phone(e) {
    latepoint_is_phone_masking_enabled() && jQuery().inputmask && e.inputmask(latepoint_get_phone_format())
}

function latepoint_get_phone_format() {
    return latepoint_helper.phone_format
}

function latepoint_is_phone_masking_enabled() {
    return "yes" == latepoint_helper.enable_phone_masking
}

function latepoint_show_booking_end_time() {
    return "yes" == latepoint_helper.show_booking_end_time
}

function latepoint_init_form_masks() {
    latepoint_is_phone_masking_enabled() && latepoint_mask_phone(jQuery(".os-mask-phone"))
}

function latepoint_get_paypal_payment_amount(e) {
    var t, a;
    return "deposit" == e.find('input[name="booking[payment_portion]"]').val() ? e.find(".lp-paypal-btn-trigger").data("deposit-amount") : e.find(".lp-paypal-btn-trigger").data("full-amount")
}

function latepoint_check_for_updates() {
    if (jQuery(".version-log-w").length) {
        var e = jQuery(".version-log-w");
        e.addClass("os-loading");
        var t, a = {
            action: "latepoint_route_call",
            route_name: t = e.data("route"),
            params: "",
            return_format: "json"
        };
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: a,
            success: function t(a) {
                e.removeClass("os-loading"), "success" === a.status ? e.html(a.message) : alert(a.message, "error")
            }
        })
    }
    if (jQuery(".version-status-info").length) {
        var o = jQuery(".version-status-info");
        o.addClass("os-loading");
        var t, a = {
            action: "latepoint_route_call",
            route_name: t = o.data("route"),
            params: "",
            return_format: "json"
        };
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: a,
            success: function e(t) {
                o.removeClass("os-loading"), "success" === t.status ? o.html(t.message) : alert(t.message, "error")
            }
        })
    }
    if (jQuery(".addons-info-holder").length) {
        var s = jQuery(".addons-info-holder");
        s.addClass("os-loading");
        var t, a = {
            action: "latepoint_route_call",
            route_name: t = s.data("route"),
            params: "",
            return_format: "json"
        };
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: a,
            success: function e(t) {
                s.removeClass("os-loading"), "success" === t.status ? s.html(t.message) : alert(t.message, "error")
            }
        })
    }
}

function _classCallCheck(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
}

function _defineProperties(e, t) {
    for (var a = 0; a < t.length; a++) {
        var o = t[a];
        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
    }
}

function _createClass(e, t, a) {
    return t && _defineProperties(e.prototype, t), a && _defineProperties(e, a), e
}

function _defineProperty(e, t, a) {
    return t in e ? Object.defineProperty(e, t, {
        value: a,
        enumerable: !0,
        configurable: !0,
        writable: !0
    }) : e[t] = a, e
}

function latepoint_quick_booking_customer_selected() {
    jQuery(".customer-info-w").removeClass("selecting").addClass("selected")
}

function latepoint_custom_day_removed(e) {
    e.closest(".custom-day-work-period").fadeOut(300, function() {
        jQuery(this).remove()
    })
}

function latepoint_booking_synced(e) {
    e.closest(".os-booking-tiny-box").removeClass("not-synced").addClass("is-synced"), latepoint_sync_update_progress(!1)
}

function latepoint_gcal_event_deleted(e) {
    e.closest(".os-booking-tiny-box").remove()
}

function latepoint_booking_unsynced(e) {
    e.closest(".os-booking-tiny-box").addClass("not-synced").removeClass("is-synced"), latepoint_sync_update_progress(!0)
}

function latepoint_count_connected_services(e) {
    var t = e.find(".agent-services-list li.active").length,
        a = e.find(".agent-services-list li").length;
    t == a ? (t = jQuery(".selected-services").data("all-text"), jQuery(".selected-services").removeClass("not-all-selected")) : (t = t + "/" + a, jQuery(".selected-services").addClass("not-all-selected")), e.find(".selected-services strong").text(t)
}

function latepoint_custom_field_removed(e) {
    e.closest(".os-custom-field-form").remove()
}

function latepoint_coupon_removed(e) {
    e.closest(".os-coupon-form").remove()
}

function latepoint_init_custom_fields_form() {
    jQuery(".latepoint-content-w").on("click", ".os-custom-field-form-info", function() {
        return jQuery(this).closest(".os-custom-field-form").toggleClass("os-is-editing"), !1
    }), jQuery(".latepoint-content-w").on("change", "select.os-custom-field-type-select", function() {
        "select" == jQuery(this).val() ? jQuery(this).closest(".os-custom-field-form").find(".os-custom-field-select-values").show() : jQuery(this).closest(".os-custom-field-form").find(".os-custom-field-select-values").hide()
    }), jQuery(".latepoint-content-w").on("keyup", ".os-custom-field-name-input", function() {
        jQuery(this).closest(".os-custom-field-form").find(".os-custom-field-name").text(jQuery(this).val())
    })
}

function latepoint_init_coupons_form() {
    jQuery(".latepoint-content-w").on("click", ".os-coupon-form-info", function() {
        return jQuery(this).closest(".os-coupon-form").toggleClass("os-is-editing"), !1
    }), jQuery(".latepoint-content-w").on("change", "select.os-coupon-medium-select", function() {
        "email" == jQuery(this).val() ? jQuery(this).closest(".os-coupon-form").find(".os-coupon-email-subject").show() : jQuery(this).closest(".os-coupon-form").find(".os-coupon-email-subject").hide()
    }), jQuery(".latepoint-content-w").on("keyup", ".os-coupon-name-input", function() {
        jQuery(this).closest(".os-coupon-form").find(".os-coupon-name").text(jQuery(this).val())
    }), jQuery(".latepoint-content-w").on("keyup", ".os-coupon-code-input", function() {
        jQuery(this).closest(".os-coupon-form").find(".os-coupon-code").text(jQuery(this).val())
    })
}

function latepoint_init_reminders_form() {
    jQuery(".latepoint-content-w").on("click", ".os-reminder-form-info", function() {
        return jQuery(this).closest(".os-reminder-form").toggleClass("os-is-editing"), !1
    }), jQuery(".latepoint-content-w").on("change", "select.os-reminder-medium-select", function() {
        "email" == jQuery(this).val() ? jQuery(this).closest(".os-reminder-form").find(".os-reminder-email-subject").show() : jQuery(this).closest(".os-reminder-form").find(".os-reminder-email-subject").hide()
    }), jQuery(".latepoint-content-w").on("keyup", ".os-reminder-name-input", function() {
        jQuery(this).closest(".os-reminder-form").find(".os-reminder-name").text(jQuery(this).val())
    })
}

function latepoint_custom_field_saved(e) {}

function latepoint_init_custom_day_schedule() {
    jQuery("#custom_day_calendar_month, #custom_day_calendar_year").on("change", function() {
        var e = jQuery(".custom-day-calendar-month"),
            t = e.data("route");
        e.addClass("os-loading");
        var a, o = {
            action: "latepoint_route_call",
            route_name: t,
            params: {
                target_date_string: jQuery("#custom_day_calendar_year").val() + "-" + jQuery("#custom_day_calendar_month").val() + "-01"
            },
            layout: "none",
            return_format: "json"
        };
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: o,
            success: function t(a) {
                e.removeClass("os-loading"), "success" === a.status && e.html(a.message)
            }
        })
    }), jQuery(".custom-day-calendar").on("click", ".os-day", function() {
        var e = jQuery(this);
        return jQuery(".custom-day-calendar .os-day.selected").removeClass("selected"), e.addClass("selected"), jQuery(".latepoint-lightbox-footer").slideDown(200), "yes" == jQuery(".custom-day-calendar").data("show-schedule") && jQuery(".latepoint-lightbox-w").removeClass("hide-schedule"), jQuery(".custom_day_schedule_date").val(e.data("date")), !1
    })
}

function latepoint_init_updates_page() {}

function latepoint_next_available_days_loaded(e) {
    e.parent().remove()
}

function latepoint_init_monthly_calendar_navigation() {
    jQuery(".os-month-next-btn").on("click", function() {
        if (jQuery(".os-monthly-calendar-days-w.active + .os-monthly-calendar-days-w").length) jQuery(".os-monthly-calendar-days-w.active").removeClass("active").next(".os-monthly-calendar-days-w").addClass("active"), latepoint_calendar_set_month_label();
        else {
            var e = jQuery(this);
            e.addClass("os-loading");
            var t = jQuery(this).data("route"),
                a = jQuery(".os-monthly-calendar-days-w.active"),
                o = a.data("calendar-year"),
                s = a.data("calendar-month");
            12 == s ? (o += 1, s = 1) : s += 1;
            var n, i, r, l = {
                action: "latepoint_route_call",
                route_name: t,
                params: {
                    target_date_string: o + "-" + s + "-1",
                    agent_id: jQuery(".agent-select").val(),
                    service_id: jQuery(".service-select").val(),
                    allow_full_access: !0
                },
                layout: "none",
                return_format: "json"
            };
            jQuery.ajax({
                type: "post",
                dataType: "json",
                url: latepoint_helper.ajaxurl,
                data: l,
                success: function t(a) {
                    e.removeClass("os-loading"), "success" === a.status && (jQuery(".os-months").append(a.message), jQuery(".os-monthly-calendar-days-w.active").removeClass("active").next(".os-monthly-calendar-days-w").addClass("active"), latepoint_calendar_set_month_label())
                }
            })
        }
        return !1
    }), jQuery(".os-month-prev-btn").on("click", function() {
        if (jQuery(".os-monthly-calendar-days-w.active").prev(".os-monthly-calendar-days-w").length) jQuery(".os-monthly-calendar-days-w.active").removeClass("active").prev(".os-monthly-calendar-days-w").addClass("active"), latepoint_calendar_set_month_label();
        else {
            var e = jQuery(this);
            e.addClass("os-loading");
            var t = jQuery(this).data("route"),
                a = jQuery(".os-monthly-calendar-days-w.active").last(),
                o = a.data("calendar-year"),
                s = a.data("calendar-month");
            1 == s ? (o -= 1, s = 12) : s -= 1;
            var n, i, r, l = {
                action: "latepoint_route_call",
                route_name: t,
                params: {
                    target_date_string: o + "-" + s + "-1",
                    agent_id: jQuery(".agent-select").val(),
                    service_id: jQuery(".service-select").val()
                },
                layout: "none",
                return_format: "json"
            };
            jQuery.ajax({
                type: "post",
                dataType: "json",
                url: latepoint_helper.ajaxurl,
                data: l,
                success: function t(a) {
                    e.removeClass("os-loading"), "success" === a.status && (jQuery(".os-months").prepend(a.message), jQuery(".os-monthly-calendar-days-w.active").removeClass("active").prev(".os-monthly-calendar-days-w").addClass("active"), latepoint_calendar_set_month_label())
                }
            })
        }
        return !1
    })
}

function latepoint_calendar_set_month_label() {
    jQuery(".os-current-month-label").text(jQuery(".os-monthly-calendar-days-w.active").data("calendar-month-label"))
}

function latepoint_init_element_togglers() {
    jQuery("[data-toggle-element]").on("click", function() {
        var e = jQuery(this);
        e.closest(".os-form-checkbox-group").toggleClass("is-checked"), console.log(e.data("toggle-element")), jQuery(e.data("toggle-element")).toggle()
    })
}

function latepoint_init_color_picker() {
    jQuery(".latepoint-color-picker").length && jQuery(".latepoint-color-picker").each(function() {
        var e = jQuery(this).data("color"),
            t = jQuery(this)[0],
            a = jQuery(this).closest(".latepoint-color-picker-w");
        Pickr.create({
            el: t,
            default: e,
            comparison: !1,
            useAsButton: !0,
            components: {
                preview: !0,
                opacity: !1,
                hue: !0,
                interaction: {
                    input: !1,
                    clear: !1,
                    save: !0
                }
            },
            onChange: function e(t, o) {
                a.find(".os-form-control").val(t.toHEX().toString())
            }
        })
    })
}

function latepoint_lightbox_close() {
    jQuery("body").removeClass("latepoint-lightbox-active"), jQuery(".latepoint-lightbox-w").remove()
}

function latepoint_reload_select_service_categories() {
    jQuery(".service-selector-adder-field-w").each(function() {
        var e = jQuery(this),
            t, a = {
                action: "latepoint_route_call",
                route_name: jQuery(".service-selector-adder-field-w").find("select").data("select-source"),
                params: "",
                return_format: "json"
            };
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: a,
            success: function t(a) {
                e.removeClass("os-loading"), "success" === a.status ? (latepoint_lightbox_close(), e.find("select").html(a.message), e.find("select option:last").attr("selected", "selected")) : alert(a.message, "error")
            }
        })
    })
}

function latepoint_wizard_item_editing_cancelled() {
    jQuery(".os-wizard-setup-w").removeClass("is-sub-editing"), jQuery(".os-wizard-footer").show(), jQuery(".os-wizard-footer .os-wizard-next-btn").show()
}

function latepoint_load_quick_availability(e, t) {
    var a = arguments.length > 1 && void 0 !== t && t;
    e.addClass("os-loading");
    var o = jQuery(".trigger-quick-availability").data("route"),
        s = jQuery(".quick-booking-form-w"),
        n = s.find('select[name="booking[agent_id]"]').val();
    a && (n = a);
    var i = s.find('input[name="booking[service_id]"]').val(),
        r = s.find(".location_id_holder").val();
    r || (s.find('select[name="booking[location_id]"]').prop("selectedIndex", 0), r = s.find('select[name="booking[location_id]"]').val()), n || (s.find('select[name="booking[agent_id]"]').prop("selectedIndex", 0), n = s.find('select[name="booking[agent_id]"]').val()), i || (s.find(".os-services-select-field-w .service-option:first").click(), i = s.find('input[name="booking[service_id]"]').val());
    var l, c = {
        action: "latepoint_route_call",
        route_name: o,
        params: "agent_id=" + n + "&service_id=" + i + "&location_id=" + r,
        return_format: "json"
    };
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: latepoint_helper.ajaxurl,
        data: c,
        success: function t(a) {
            e.removeClass("os-loading"), "success" === a.status ? (jQuery(".latepoint-side-panel-w .quick-availability-per-day-w").length ? jQuery(".latepoint-side-panel-w .quick-availability-per-day-w").replaceWith(a.message) : jQuery(".latepoint-side-panel-w").append(a.message), latepoint_init_quick_availability_form()) : alert(a.message, "error")
        }
    })
}

function latepoint_init_quick_availability_form() {
    jQuery('.quick-availability-per-day-w select[name="booking[agent_id]"]').on("change", function() {
        latepoint_load_quick_availability(jQuery(".trigger-quick-availability"), jQuery(this).val())
    }), jQuery(".os-time-group label").on("click", function() {
        jQuery(this).closest(".os-time-group").find(".os-form-control").focus()
    }), jQuery(".quick-availability-per-day-w").on("click", ".fill-booking-time", function() {
        jQuery(".os-availability-days .agent-timeslot.selected").removeClass("selected"), jQuery(this).addClass("selected");
        var e = jQuery(this).data("date"),
            t = jQuery(this).data("minutes"),
            a = jQuery(".os-services-select-field-w .service-option-selected").data("duration"),
            o = jQuery(".quick-booking-form-w");
        o.find('input[name="booking[start_date]"]').val(e);
        var s = t,
            n = t + a,
            i = latepoint_minutes_to_hours_and_minutes(s),
            r = latepoint_minutes_to_hours_and_minutes(n);
        s >= 720 ? o.find(".quick-start-time-w .time-pm").click() : o.find(".quick-start-time-w .time-am").click(), n >= 720 ? o.find(".quick-end-time-w .time-pm").click() : o.find(".quick-end-time-w .time-am").click(), jQuery('.quick-booking-form-w select[name="booking[agent_id]"]').val(jQuery(this).closest(".quick-availability-per-day-w").data("agent-id")), o.find('input[name="booking[start_time][formatted_value]"]').val(i), o.find('input[name="booking[end_time][formatted_value]"]').val(r)
    })
}

function latepoint_init_work_period_form() {
    latepoint_mask_timefield(jQuery(".os-time-input-w .os-mask-time"))
}

function latepoint_init_quick_booking_form() {
    jQuery(".trigger-quick-availability").on("click", function() {
        return latepoint_load_quick_availability(jQuery(".open-quick-availability-btn")), !1
    }), jQuery('.quick-booking-form-w input[name="booking[start_time][formatted_value]"]').on("change", function() {
        latepoint_set_booking_end_time()
    }), latepoint_mask_timefield(jQuery(".latepoint-side-panel-w .os-mask-time")), latepoint_mask_phone(jQuery(".latepoint-side-panel-w .os-mask-phone")), jQuery(".customers-selector-search-input").keyup(function() {
        var e = jQuery(this).val().toLowerCase();
        jQuery(".customers-options-list .customer-option").hide(), jQuery(".customers-options-list .customer-option .customer-option-info-name").each(function() {
            -1 != jQuery(this).text().toLowerCase().indexOf("" + e) && jQuery(this).closest(".customer-option").show()
        })
    }), jQuery(".latepoint-side-panel-w").on("change", ".agent-selector", function() {
        latepoint_apply_agent_selector_change()
    }), jQuery(".latepoint-side-panel-w").on("change", 'select[name="booking[location_id]"]', function() {
        latepoint_apply_agent_selector_change()
    }), jQuery(".latepoint-side-panel-w").on("click", ".services-options-list .service-option", function() {
        var e = jQuery(this).html(),
            t;
        return jQuery(this).closest(".os-services-select-field-w").find(".service-option-selected").html(e).data("id", jQuery(this).data("id")).data("duration", jQuery(this).data("duration")).data("buffer-before", jQuery(this).data("buffer-before")).data("buffer-after", jQuery(this).data("buffer-after")), jQuery(this).closest(".os-services-select-field-w").removeClass("active"), latepoint_apply_service_selector_change(), !1
    })
}

function latepoint_reload_widget(e) {
    var t = e.find("select, input").serialize(),
        a = {
            action: "latepoint_route_call",
            route_name: e.data("os-reload-action"),
            params: t,
            return_format: "json"
        };
    e.addClass("os-loading"), jQuery.ajax({
        type: "post",
        dataType: "json",
        url: latepoint_helper.ajaxurl,
        data: a,
        success: function t(a) {
            if (e.removeClass("os-loading"), "success" === a.status) {
                var o = jQuery(a.message);
                o.removeClass("os-widget-animated"), e = e.replaceWith(o), latepoint_init_daterangepicker(o.find(".os-date-range-picker")), e.hasClass("os-widget-top-agents") && latepoint_init_circles_charts(), e.hasClass("os-widget-daily-bookings") && latepoint_init_daily_bookings_chart()
            } else alert(a.message)
        }
    })
}

function latepoint_load_calendar(e, t) {
    var a, o, s = {
        action: "latepoint_route_call",
        route_name: jQuery(".calendar-week-agent-w").data("calendar-action"),
        params: "target_date=" + e + "&selected_agent_id=" + t,
        return_format: "json"
    };
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: latepoint_helper.ajaxurl,
        data: s,
        success: function e(t) {
            "success" === t.status ? (jQuery(".calendar-week-agent-w").html(t.message), jQuery(".calendar-load-target-date.os-loading").removeClass("os-loading")) : alert(t.message)
        }
    })
}

function latepoint_apply_agent_selector_change() {
    jQuery(".quick-availability-per-day-w").length && latepoint_load_quick_availability(jQuery(".trigger-quick-availability"))
}

function latepoint_set_booking_end_time() {
    var e = jQuery(".os-services-select-field-w .service-option-selected").data("duration"),
        t = jQuery("form.booking-quick-edit-form"),
        a = t.find('input[name="booking[start_time][formatted_value]"]').val();
    if (a) {
        var o, s = latepoint_hours_and_minutes_to_minutes(a, t.find('input[name="booking[start_time][ampm]"]').val()),
            n = parseInt(s) + parseInt(e),
            i = n >= 720 ? "pm" : "am",
            r = latepoint_minutes_to_hours_and_minutes(n);
        t.find('input[name="booking[end_time][formatted_value]"]').val(r), t.find(".quick-end-time-w .time-ampm-select.time-" + i).click(), t.find('input[name="booking[end_time][formatted_value]"]').closest(".os-form-group").addClass("has-value")
    }
}

function latepoint_apply_service_selector_change() {
    latepoint_set_booking_end_time();
    var e = jQuery(".os-services-select-field-w .service-option-selected"),
        t = e.data("id"),
        a = e.data("buffer-before"),
        o = e.data("buffer-after"),
        s = jQuery("form.booking-quick-edit-form");
    s.find('input[name="booking[buffer_before]"]').val(a), s.find('input[name="booking[buffer_after]"]').val(o), s.find('input[name="booking[service_id]"]').val(t), s.find('input[name="booking[buffer_before]"]').closest(".os-form-group").addClass("has-value"), s.find('input[name="booking[buffer_after]"]').closest(".os-form-group").addClass("has-value"), s.find('input[name="booking[service_id]"]').closest(".os-form-group").addClass("has-value"), jQuery(".quick-availability-per-day-w").length && latepoint_load_quick_availability(jQuery(".trigger-quick-availability"))
}

function latepoint_init_daily_bookings_chart() {
    if ("undefined" != typeof Chart && jQuery("#chartDailyBookings").length) {
        var e, t = jQuery("#chartDailyBookings"),
            a = t.data("chart-labels").toString().split(","),
            o = t.data("chart-values").toString().split(",").map(Number),
            s = Math.max.apply(Math, o) + 10,
            n = "-apple-system, system-ui, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif";
        Chart.defaults.global.defaultFontFamily = n, Chart.defaults.global.defaultFontSize = 18, Chart.defaults.global.defaultFontStyle = "400", Chart.defaults.global.tooltips.titleFontFamily = n, Chart.defaults.global.tooltips.titleFontSize = 10, Chart.defaults.global.tooltips.titleFontColor = "rgba(255,255,255,0.6)", Chart.defaults.global.tooltips.titleFontStyle = "400", Chart.defaults.global.tooltips.titleMarginBottom = 1, Chart.defaults.global.tooltips.bodyFontFamily = n, Chart.defaults.global.tooltips.bodyFontSize = 24, Chart.defaults.global.tooltips.bodyFontStyle = "500", Chart.defaults.global.tooltips.displayColors = !1, Chart.defaults.global.tooltips.xPadding = 10, Chart.defaults.global.tooltips.yPadding = 8, Chart.defaults.global.tooltips.yAlign = "bottom", Chart.defaults.global.tooltips.xAlign = "center", Chart.defaults.global.tooltips.cornerRadius = 0, Chart.defaults.global.tooltips.intersect = !1;
        var i = t[0].getContext("2d"),
            r = i.createLinearGradient(500, 0, 100, 0);
        r.addColorStop(0, "#587ef8"), r.addColorStop(1, "#587ef8");
        var l = i.createLinearGradient(0, 200, 0, 50);
        l.addColorStop(0, "rgba(163, 165, 243, 0)"), l.addColorStop(1, "rgba(163, 165, 243, 0.2)");
        var c = {
                labels: a,
                datasets: [(e = {
                    label: "",
                    fill: !0,
                    lineTension: .3,
                    backgroundColor: "#fff"
                }, _defineProperty(e, "backgroundColor", l), _defineProperty(e, "borderColor", "#456EFF"), _defineProperty(e, "borderWidth", 2), _defineProperty(e, "borderCapStyle", "butt"), _defineProperty(e, "borderDash", []), _defineProperty(e, "borderDashOffset", 0), _defineProperty(e, "borderJoinStyle", "miter"), _defineProperty(e, "pointBorderColor", "#fbfcff"), _defineProperty(e, "borderColor", r), _defineProperty(e, "pointBackgroundColor", "#2755F9"), _defineProperty(e, "pointRadius", 0), _defineProperty(e, "pointBorderWidth", 0), _defineProperty(e, "pointHoverRadius", 3), _defineProperty(e, "pointHoverBorderWidth", 2), _defineProperty(e, "pointHoverBackgroundColor", "#587ef8"), _defineProperty(e, "pointHoverBorderColor", "#fff"), _defineProperty(e, "pointHitRadius", 15), _defineProperty(e, "data", o), _defineProperty(e, "spanGaps", !1), e)]
            },
            d = new Chart(t, {
                type: "line",
                data: c,
                options: {
                    responsive: !0,
                    maintainAspectRatio: !1,
                    legend: {
                        display: !1
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: "10",
                                fontColor: "#8894AF"
                            },
                            gridLines: {
                                color: "rgba(0,0,0,0)",
                                zeroLineColor: "rgba(0,0,0,0)"
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: "rgba(0,0,0,0.03)",
                                zeroLineColor: "rgba(0,0,0,0.05)"
                            },
                            ticks: {
                                beginAtZero: !0,
                                suggestedMax: s,
                                fontSize: "10",
                                fontColor: "#8894AF"
                            }
                        }]
                    }
                }
            })
    }
}

function latepoint_reload_daily_agent_widgets() {
    jQuery(".bookings-daily-agent").addClass("os-loading");
    var e = jQuery(".agent-select").val(),
        t = jQuery(".service-select").val(),
        a = jQuery(".daily-agent-monthly-calendar-w .os-day.selected").data("date"),
        o, s, n = {
            action: "latepoint_route_call",
            route_name: jQuery(".bookings-daily-agent").data("route"),
            params: "selected_agent_id=" + e + "&selected_service_id=" + t + "&target_date=" + a,
            layout: "none",
            return_format: "json"
        };
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: latepoint_helper.ajaxurl,
        data: n,
        success: function e(t) {
            "success" === t.status && (jQuery(".bookings-daily-agent").replaceWith(t.message), latepoint_init_daily_agent_widgets(), latepoint_init_donut_charts(), latepoint_init_monthly_calendar_navigation()), jQuery(".bookings-daily-agent").removeClass("os-loading")
        }
    })
}

function latepoint_init_daily_agent_widgets() {
    jQuery("select.agent-select, select.service-select").on("change", function() {
        latepoint_reload_daily_agent_widgets()
    }), jQuery(".daily-agent-monthly-calendar-w").on("click", ".os-day", function() {
        jQuery(".daily-agent-monthly-calendar-w .os-day.selected").removeClass("selected"), jQuery(this).addClass("selected"), latepoint_reload_daily_agent_widgets()
    })
}

function latepoint_init_donut_charts() {
    "undefined" != typeof Chart && jQuery(".os-donut-chart").length && jQuery(".os-donut-chart").each(function(e) {
        var t = jQuery(this).data("chart-colors").toString().split(","),
            a = jQuery(this).data("chart-labels").toString().split(","),
            o = jQuery(this).data("chart-values").toString().split(",").map(Number),
            s = jQuery(this),
            n = new Chart(s, {
                type: "doughnut",
                data: {
                    labels: a,
                    datasets: [{
                        data: o,
                        backgroundColor: t,
                        hoverBackgroundColor: t,
                        borderWidth: 6,
                        hoverBorderColor: "transparent"
                    }]
                },
                options: {
                    legend: {
                        display: !1
                    },
                    animation: {
                        animateScale: !0
                    },
                    cutoutPercentage: 85,
                    responsive: !0,
                    maintainAspectRatio: !0
                }
            })
    })
}

function latepoint_init_circles_charts() {
    jQuery(".circle-chart").each(function(e) {
        var t = jQuery(this).prop("id"),
            a = jQuery(this).data("max-value"),
            o = jQuery(this).data("chart-value"),
            s = jQuery(this).data("chart-color"),
            n = jQuery(this).data("chart-color-fade"),
            i = Circles.create({
                id: t,
                radius: 25,
                value: o,
                maxValue: a,
                width: 2,
                text: function e(t) {
                    return Math.round(t)
                },
                colors: [s, n],
                duration: 200,
                wrpClass: "circles-wrp",
                textClass: "circles-text",
                valueStrokeClass: "circles-valueStroke",
                maxValueStrokeClass: "circles-maxValueStroke",
                styleWrapper: !0,
                styleText: !0
            })
    })
}

function latepoint_get_order_for_service_categories() {}

function latepoint_init_daterangepicker(e) {
    e.each(function() {
        var e = jQuery(this).find('input[name="date_from"], .os-datepicker-date-from').val(),
            t = jQuery(this).find('input[name="date_to"], .os-datepicker-date-to').val(),
            a = {};
        jQuery(this).data("can-be-cleared") && (a = {
            cancelLabel: jQuery(this).data("clear-btn-label")
        }), jQuery(this).daterangepicker({
            opens: "left",
            singleDatePicker: "yes" == jQuery(this).data("single-date"),
            startDate: e ? moment(e) : moment(),
            endDate: t ? moment(t) : moment(),
            locale: a
        })
    }), e.on("cancel.daterangepicker", function(e, t) {
        t.element.data("can-be-cleared") && (t.element.find('input[name="date_from"], .os-datepicker-date-from').val(""), t.element.find('input[name="date_to"], .os-datepicker-date-to').val(""), t.element.find("span.range-picker-value").text(t.element.data("no-value-label")), t.element.hasClass("os-table-filter-datepicker") && latepoint_filter_table(t.element.closest("table"), t.element.closest(".os-form-group")))
    }), e.on("apply.daterangepicker", function(e, t) {
        "yes" == t.element.data("single-date") ? t.element.find(".range-picker-value").text(t.startDate.format("ll")) : t.element.find(".range-picker-value").text(t.startDate.format("ll") + " - " + t.endDate.format("ll")), t.element.find('input[name="date_from"], .os-datepicker-date-from').attr("value", t.startDate.format("YYYY-MM-DD")), t.element.find('input[name="date_to"], .os-datepicker-date-to').attr("value", t.endDate.format("YYYY-MM-DD")), t.element.closest(".os-widget").length && latepoint_reload_widget(t.element.closest(".os-widget")), t.element.hasClass("os-table-filter-datepicker") && latepoint_filter_table(t.element.closest("table"), t.element.closest(".os-form-group"))
    })
}

function latepoint_recalculate_services_count_in_category() {
    jQuery(".os-category-services-count").each(function() {
        var e = jQuery(this).closest(".os-category-parent-w").find(".service-in-category-w").length;
        jQuery(this).find("span").text(e)
    })
}

function latepoint_remove_agent_box(e) {
    var t;
    e.closest(".agent-box-w").fadeOut(300, function() {
        jQuery(this).remove()
    })
}

function latepoint_remove_service_box(e) {
    var t;
    e.closest(".service-box-w").fadeOut(300, function() {
        jQuery(this).remove()
    })
}

function latepoint_init_monthly_view() {
    jQuery(".calendar-month-agents-w").length && (jQuery(".ma-days-with-bookings-w").length, jQuery("#monthly_calendar_month_select, #monthly_calendar_year_select").on("change", function() {
        var e = jQuery(".calendar-month-agents-w"),
            t = e.data("route");
        e.addClass("os-loading");
        var a, o = {
            action: "latepoint_route_call",
            route_name: t,
            params: {
                month: jQuery("#monthly_calendar_month_select").val(),
                year: jQuery("#monthly_calendar_year_select").val()
            },
            layout: "none",
            return_format: "json"
        };
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: o,
            success: function t(a) {
                e.removeClass("os-loading"), "success" === a.status && e.html(a.message)
            }
        })
    }), jQuery(".custom-day-calendar").on("click", ".os-day", function() {
        var e = jQuery(this);
        return jQuery(".custom-day-calendar .os-day.selected").removeClass("selected"), e.addClass("selected"), jQuery(".latepoint-lightbox-footer").slideDown(200), "yes" == jQuery(".custom-day-calendar").data("show-schedule") && jQuery(".latepoint-lightbox-w").removeClass("hide-schedule"), jQuery(".custom_day_schedule_date").val(e.data("date")), !1
    }))
}

function latepoint_init_copy_on_click_elements() {
    jQuery(".os-click-to-copy").mouseenter(function() {
        var e = jQuery(this).position(),
            t = jQuery(this).outerWidth(),
            a = e.left + t + 5;
        jQuery(this).after('<div class="os-click-to-copy-prompt" style="top: ' + e.top + "px; left: " + a + 'px;">' + latepoint_helper.click_to_copy_prompt + "</div>")
    }).mouseleave(function() {
        jQuery(this).nextAll(".os-click-to-copy-prompt").remove()
    }), jQuery(".os-click-to-copy").on("click", function() {
        var e = jQuery(this);
        e.nextAll(".os-click-to-copy-prompt").hide();
        var t = jQuery("<input>");
        jQuery("body").append(t), t.val(e.text()).select(), document.execCommand("Copy"), t.remove();
        var a = e.position(),
            o = e.outerWidth(),
            s = a.left + o + 5,
            n;
        jQuery('<div class="os-click-to-copy-done" style="top: ' + a.top + "px; left: " + s + 'px;">' + latepoint_helper.click_to_copy_done + "</div>").insertAfter(e).animate({
            opacity: 0,
            left: s + 20
        }, 600), setTimeout(function() {
            e.nextAll(".os-click-to-copy-done").remove(), e.nextAll(".os-click-to-copy-prompt").show()
        }, 800)
    })
}

function latepoint_sync_update_progress(e) {
    var t = jQuery(".os-sync-stat-tiles .os-tile-value span").text();
    t = e ? parseInt(t) - 1 : parseInt(t) + 1, jQuery(".os-sync-stat-tiles .os-tile-value span").text(t), jQuery(".os-tile-hor-progress-chart").data("value", t);
    var a = jQuery(".os-tile-hor-progress-chart").data("total"),
        o = jQuery(".os-tile-hor-progress-chart").data("value");
    if (a > 0) {
        var s = Math.round(o / a * 100);
        jQuery(".os-tile-hor-progress-chart-value").css("width", s + "%")
    }
}

function latepoint_remove_first_synced_booking_with_google() {
    var e = jQuery(".os-booking-tiny-box.is-synced:first .os-booking-sync-google-trigger");
    if (!e.length || jQuery(".remove-all-bookings-from-google-trigger").hasClass("stop-removing")) return jQuery(".remove-all-bookings-from-google-trigger").removeClass("os-removing").removeClass("stop-removing").find("span").text(jQuery(".remove-all-bookings-from-google-trigger").data("label-remove")), !1;
    var t, a, o = {
        action: "latepoint_route_call",
        route_name: e.data("os-remove-action"),
        params: e.data("os-params"),
        layout: "none",
        return_format: "json"
    };
    e.addClass("os-loading"), jQuery.ajax({
        type: "post",
        dataType: "json",
        url: latepoint_helper.ajaxurl,
        data: o,
        success: function t(a) {
            "success" === a.status && (e.closest(".os-booking-tiny-box").removeClass("is-synced").addClass("not-synced"), e.removeClass("os-loading"), latepoint_sync_update_progress(!0), latepoint_remove_first_synced_booking_with_google())
        }
    })
}

function latepoint_sync_next_booking_with_google() {
    var e = jQuery(".os-booking-tiny-box.not-synced:first .os-booking-sync-google-trigger");
    if (!e.length || jQuery(".sync-all-bookings-to-google-trigger").hasClass("stop-syncing")) return jQuery(".sync-all-bookings-to-google-trigger").removeClass("os-syncing").removeClass("stop-syncing").find("span").text(jQuery(".sync-all-bookings-to-google-trigger").data("label-sync")), !1;
    var t, a, o = {
        action: "latepoint_route_call",
        route_name: e.data("os-action"),
        params: e.data("os-params"),
        layout: "none",
        return_format: "json"
    };
    e.addClass("os-loading"), jQuery.ajax({
        type: "post",
        dataType: "json",
        url: latepoint_helper.ajaxurl,
        data: o,
        success: function t(a) {
            "success" === a.status && (e.closest(".os-booking-tiny-box").removeClass("not-synced").addClass("is-synced"), e.removeClass("os-loading"), latepoint_sync_update_progress(!1), latepoint_sync_next_booking_with_google())
        }
    })
}

function latepoint_filter_table(e, t, a) {
    var o = !(arguments.length > 2 && void 0 !== a) || a;
    t.addClass("os-loading");
    var s = e.find(".os-table-filter").serialize(),
        n = e.closest(".table-with-pagination-w");
    o ? n.find("select.pagination-page-select").val(1) : s += "&page_number=" + n.find("select.pagination-page-select").val();
    var i, r = {
        action: "latepoint_route_call",
        route_name: e.data("route"),
        params: s,
        layout: "none",
        return_format: "json"
    };
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: latepoint_helper.ajaxurl,
        data: r,
        success: function a(s) {
            if (t.removeClass("os-loading"), "success" === s.status) {
                if (e.find("tbody").html(s.message), s.total_pages && o) {
                    for (var i = "", r = 1; r <= s.total_pages; r++) i += "<option>" + r + "</option>";
                    n.find("select.pagination-page-select").html(i)
                }
                n.find(".os-pagination-from").text(s.showing_from), n.find(".os-pagination-to").text(s.showing_to), n.find(".os-pagination-total").text(s.total_records)
            }
        }
    })
}
jQuery(document).ready(function(e) {
    e(".latepoint").on("click", "button[data-os-action], a[data-os-action], div[data-os-action], span[data-os-action]", function(t) {
        var a = e(this);
        if (a.data("os-prompt") && !confirm(a.data("os-prompt"))) return !1;
        var o = e(this).data("os-params");
        e(this).data("os-source-of-params") && (o = e(e(this).data("os-source-of-params")).find("select, input, textarea").serialize());
        var s = a.data("os-return-format") ? a.data("os-return-format") : "json",
            n = {
                action: "latepoint_route_call",
                route_name: e(this).data("os-action"),
                params: o,
                return_format: s
            };
        return a.addClass("os-loading"), e.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: n,
            success: function t(o) {
                if ("success" === o.status) {
                    if ("lightbox" == a.data("os-output-target")) latepoint_show_data_in_lightbox(o.message, a.data("os-lightbox-classes"));
                    else if ("side-panel" == a.data("os-output-target")) e(".latepoint-side-panel-w").remove(), e("body").append('<div class="latepoint-side-panel-w"><div class="latepoint-side-panel-i">' + o.message + '</div><div class="latepoint-side-panel-shadow"></div></div>');
                    else {
                        if ("reload" == a.data("os-success-action")) return latepoint_add_notification(o.message), void location.reload();
                        if ("redirect" == a.data("os-success-action")) return void(a.data("os-redirect-to") ? (latepoint_add_notification(o.message), window.location.replace(a.data("os-redirect-to"))) : window.location.replace(o.message));
                        a.data("os-output-target") && e(a.data("os-output-target")).length ? "append" == a.data("os-output-target-do") ? e(a.data("os-output-target")).append(o.message) : e(a.data("os-output-target")).html(o.message) : "before" == a.data("os-before-after") ? a.before(o.message) : "before" == a.data("os-before-after") ? a.after(o.message) : latepoint_add_notification(o.message)
                    }
                    if (a.data("os-after-call")) {
                        var s = a.data("os-after-call");
                        a.data("os-pass-this") ? window[s](a) : a.data("os-pass-response") ? window[s](o) : window[s]()
                    }
                    a.removeClass("os-loading")
                } else a.removeClass("os-loading"), a.data("os-output-target") && e(a.data("os-output-target")).length ? e(a.data("os-output-target")).prepend(latepoint_generate_form_message_html(o.message, "error")) : alert(o.message)
            }
        }), !1
    }), e(".latepoint").on("click", 'form[data-os-action] button[type="submit"]', function(t) {
        e(this).addClass("os-loading")
    }), e(".latepoint").on("submit", "form[data-os-action]", function(t) {
        t.preventDefault();
        var a = e(this),
            o = a.serialize(),
            s = {
                action: "latepoint_route_call",
                route_name: e(this).data("os-action"),
                params: o,
                return_format: "json"
            };
        return a.find('button[type="submit"]').addClass("os-loading"), e.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: s,
            success: function t(o) {
                if (a.find('button[type="submit"].os-loading').removeClass("os-loading"), latepoint_clear_form_messages(a), "success" === o.status) {
                    if ("reload" == a.data("os-success-action")) return latepoint_add_notification(o.message), void location.reload();
                    if ("redirect" == a.data("os-success-action")) return void(a.data("os-redirect-to") ? (latepoint_add_notification(o.message), window.location.replace(a.data("os-redirect-to"))) : window.location.replace(o.message));
                    if (a.data("os-output-target") && e(a.data("os-output-target")).length ? e(a.data("os-output-target")).html(o.message) : "redirect" == o.message ? window.location.replace(o.url) : (latepoint_add_notification(o.message), a.prepend(latepoint_generate_form_message_html(o.message, "success"))), a.data("os-record-id-holder") && o.record_id && a.find('[name="' + a.data("os-record-id-holder") + '"]').val(o.record_id), a.data("os-after-call")) {
                        var s = a.data("os-after-call");
                        a.data("os-pass-response") ? window[s](o) : window[s]()
                    }
                    o.form_values_to_update && e.each(o.form_values_to_update, function(e, t) {
                        a.find('[name="' + e + '"]').val(t)
                    }), e("button.os-loading").removeClass("os-loading")
                } else e("button.os-loading").removeClass("os-loading"), a.data("os-show-errors-as-notification") ? latepoint_add_notification(o.message, "error") : (a.prepend(latepoint_generate_form_message_html(o.message, "error")), e([document.documentElement, document.body]).animate({
                    scrollTop: a.find(".os-form-message-w").offset().top - 30
                }, 200))
            }
        }), !1
    })
}), jQuery(document).ready(function(e) {
    latepoint_check_for_updates()
});
var OsGoogleCalendar = function() {
    function e() {
        _classCallCheck(this, e)
    }
    return _createClass(e, [{
        key: "init",
        value: function e() {
            var t = this;
            gapi.load("client:auth2", function() {
                gapi.client.init({
                    clientId: latepoint_helper.google_calendar_client_id,
                    discoveryDocs: ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"],
                    scope: "https://www.googleapis.com/auth/calendar.events"
                }).then(function() {
                    jQuery(".os-google-cal-authorize-btn").on("click", function() {
                        return gapi.auth2.getAuthInstance().grantOfflineAccess().then(t.saveAuthCode), !1
                    })
                })
            })
        }
    }, {
        key: "saveAuthCode",
        value: function e(t) {
            var a = {
                    code: t.code,
                    agent_id: jQuery(".os-google-cal-authorize-btn").data("agent-id")
                },
                o = {
                    action: "latepoint_route_call",
                    route_name: jQuery(".os-google-cal-authorize-btn").data("route"),
                    params: a,
                    layout: "none",
                    return_format: "json"
                };
            $.ajax({
                type: "POST",
                url: latepoint_helper.ajaxurl,
                dataType: "json",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },
                data: o,
                success: function e(t) {
                    latepoint_add_notification(t.message), location.reload()
                }
            })
        }
    }]), e
}();
jQuery(document).ready(function(e) {
    latepoint_helper.google_calendar_is_enabled && jQuery(".os-google-cal-authorize-btn").length && (latepoint_helper.google_calendar = new OsGoogleCalendar, latepoint_helper.google_calendar.init()), latepoint_init_daily_agent_widgets(), latepoint_init_circles_charts(), latepoint_init_donut_charts(), latepoint_init_daily_bookings_chart(), latepoint_init_element_togglers(), latepoint_init_daterangepicker(jQuery(".os-date-range-picker")), latepoint_init_monthly_calendar_navigation(), latepoint_init_monthly_view(), latepoint_init_custom_fields_form(), latepoint_init_reminders_form(), latepoint_init_coupons_form(), latepoint_init_copy_on_click_elements(), latepoint_init_color_picker(), jQuery(".os-main-location-selector").on("change", function() {
        var e, t, a = {
            action: "latepoint_route_call",
            route_name: jQuery(this).data("route"),
            params: "id=" + jQuery(this).val(),
            layout: "none",
            return_format: "json"
        };
        jQuery(".latepoint-content-w").addClass("os-loading"), jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: a,
            success: function e(t) {
                location.reload()
            }
        })
    }), e(".latepoint-mobile-top-menu-trigger").on("click", function() {
        return e(this).closest(".latepoint-all-wrapper").toggleClass("os-show-mobile-menu"), e(this).closest(".latepoint-all-wrapper").hasClass("os-show-mobile-menu") ? e(".latepoint-side-menu-w ul.side-menu > li.has-children > a").on("click", function() {
            return e(this).closest("li").toggleClass("menu-item-sub-open-mobile"), !1
        }) : e(".latepoint-side-menu-w ul.side-menu > li.has-children > a").off("click"), !1
    }), e(".latepoint-mobile-top-search-trigger-cancel").on("click", function() {
        return e(this).closest(".latepoint-all-wrapper").removeClass("os-show-mobile-search"), !1
    }), e(".latepoint-mobile-top-search-trigger").on("click", function() {
        return e(this).closest(".latepoint-all-wrapper").toggleClass("os-show-mobile-search"), e(this).closest(".latepoint-all-wrapper").hasClass("os-show-mobile-search") && e(".latepoint-top-search").focus(), !1
    }), e(".os-widget-header-actions-trigger").on("click", function() {
        return e(this).closest(".os-widget-header").toggleClass("os-show-actions"), !1
    }), e(".sync-all-bookings-to-google-trigger").on("click", function() {
        return e(this).hasClass("os-syncing") ? (e(this).addClass("stop-syncing"), e(this).find("span").text(e(this).data("label-sync"))) : (e(this).find("span").text(e(this).data("label-cancel-sync")), e(this).addClass("os-syncing"), latepoint_sync_next_booking_with_google()), !1
    }), e(".remove-all-bookings-from-google-trigger").on("click", function() {
        if (e(this).hasClass("os-removing")) e(this).addClass("stop-removing"), e(this).find("span").text(e(this).data("label-remove"));
        else {
            if (!confirm(e(this).data("os-prompt"))) return !1;
            e(this).find("span").text(e(this).data("label-cancel-remove")), e(this).addClass("os-removing"), latepoint_remove_first_synced_booking_with_google()
        }
        return !1
    }), jQuery(".download-csv-with-filters").on("click", function() {
        var e = jQuery(this).closest("table").find(".os-table-filter").serialize();
        e += "&download=csv", jQuery(this).attr("href", this.href + "&" + e)
    }), e("select.pagination-page-select").on("change", function() {
        latepoint_filter_table(jQuery(this).closest(".table-with-pagination-w").find("table"), jQuery(this).closest(".pagination-page-select-w"), !1)
    }), e("select.os-table-filter").on("change", function() {
        latepoint_filter_table(jQuery(this).closest("table"), jQuery(this).closest(".os-form-group"))
    }), e("input.os-table-filter").on("keyup", function() {
        latepoint_filter_table(jQuery(this).closest("table"), jQuery(this).closest(".os-form-group"))
    }), jQuery(".customize-agent-service-btn").on("click", function() {
        return jQuery(this).closest(".agent").toggleClass("show-customize-box"), !1
    }), jQuery(".agent-services-list").on("click", "li", function() {
        return jQuery(this).hasClass("active") ? (jQuery(this).removeClass("active"), jQuery(this).find("input.agent-service-connection").val("no")) : (jQuery(this).addClass("active"), jQuery(this).find("input.agent-service-connection").val("yes")), latepoint_count_connected_services(jQuery(this).closest(".agent")), !1
    }), jQuery(".add-service-category-trigger").on("click", function() {
        return e(".add-service-category-box").toggle(), e(".os-new-service-category-form-w").toggle(), !1
    }), jQuery(".latepoint-top-search").on("keyup", function(e) {
        var t = jQuery(this).closest(".latepoint-top-search-w");
        t.addClass("os-loading");
        var a = jQuery(this).val();
        if (27 == e.keyCode) return t.removeClass("typing"), jQuery(".latepoint-top-search-results-w").html(""), jQuery(this).val(""), void t.removeClass("os-loading");
        if ("" == a) return t.removeClass("typing"), jQuery(".latepoint-top-search-results-w").html(""), void t.removeClass("os-loading");
        var o, s, n = {
            action: "latepoint_route_call",
            route_name: jQuery(this).data("route"),
            params: "query=" + a,
            layout: "none",
            return_format: "json"
        };
        t.addClass("typing"), jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: n,
            success: function e(a) {
                t.hasClass("typing") && (t.removeClass("os-loading"), "success" === a.status && jQuery(".latepoint-top-search-results-w").html(a.message))
            }
        })
    }), jQuery(".appointment-status-selector").on("click", function(e) {
        e.stopPropagation()
    }), jQuery(".aba-button-w").on("click", function(e) {
        e.stopPropagation();
        var t = jQuery(this).hasClass("aba-approve") ? latepoint_helper.approve_confirm : latepoint_helper.reject_confirm,
            a;
        confirm(t) && jQuery(this).closest(".appointment-box-large").find(".appointment-status-selector select").val(jQuery(this).data("status")).change();
        return !1
    }), jQuery(".appointment-status-selector select").on("change", function(e) {
        var t = jQuery(this).closest(".appointment-status-selector"),
            a = t.data("route"),
            o = t.data("booking-id"),
            s = jQuery(this).val();
        jQuery(this).closest(".appointment-box-large").attr("class", "appointment-box-large status-" + s);
        var n, i = {
            action: "latepoint_route_call",
            route_name: a,
            params: "id=" + o + "&status=" + s,
            layout: "none",
            return_format: "json"
        };
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: i,
            success: function e(t) {
                "success" === t.status && latepoint_add_notification(t.message)
            }
        })
    }), jQuery("body").on("click", ".os-notifications .os-notification-close", function() {
        return jQuery(this).closest(".item").remove(), !1
    }), jQuery("body").on("keyup", ".os-form-group .os-form-control", function() {
        jQuery(this).val() ? jQuery(this).closest(".os-form-group").addClass("has-value") : jQuery(this).closest(".os-form-group").removeClass("has-value")
    }), jQuery(".os-wizard-setup-w, .latepoint-settings-w, .custom-schedule-wrapper").on("click", ".ws-head", function() {
        var e = jQuery(this).closest(".weekday-schedule-w");
        e.toggleClass("is-editing").removeClass("day-off"), e.find(".os-toggler").removeClass("off"), e.find("input.is-active").val(1)
    }), latepoint_mask_timefield(jQuery(".os-mask-time")), latepoint_mask_phone(jQuery(".os-mask-phone")), jQuery(".latepoint").on("click", ".wizard-add-edit-item-trigger", function(e) {
        jQuery(this).addClass("os-loading");
        var t = jQuery(this).data("route"),
            a = {};
        jQuery(this).data("id") && (a.id = jQuery(this).data("id"));
        var o = {
            action: "latepoint_route_call",
            route_name: t,
            params: a,
            layout: "none",
            return_format: "json"
        };
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: o,
            success: function e(t) {
                jQuery(".wizard-add-edit-item-trigger.os-loading").removeClass("os-loading"), "success" === t.status && (jQuery(".os-wizard-step-content-i").html(t.message), jQuery(".os-wizard-setup-w").addClass("is-sub-editing"), jQuery(".os-wizard-footer").hide())
            }
        })
    }), jQuery(".addons-info-holder").on("click", ".os-install-addon-btn", function() {
        var e = jQuery(this);
        e.addClass("os-loading");
        var t = {
            action: "latepoint_route_call",
            route_name: e.data("route-name"),
            params: {
                addon_name: e.data("addon-name")
            },
            layout: "none",
            return_format: "json"
        };
        return jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: t,
            success: function t(a) {
                e.removeClass("os-loading"), "success" === a.status ? (e.closest(".addon-box").addClass("status-installed").removeClass("status-update-available"), latepoint_add_notification(a.message), e.closest(".addon-footer").html('<div class="os-addon-installed-label"><span><i class="latepoint-icon latepoint-icon-checkmark"></i></span><span>' + latepoint_helper.msg_addon_installed + "</span></div>")) : "404" == a.code ? latepoint_show_data_in_lightbox(a.message) : alert(a.message)
            }
        }), !1
    }), jQuery(".latepoint").on("click", ".os-wizard-next-btn", function() {
        var e = jQuery(this);
        e.addClass("os-loading");
        var t, a = "current_step=" + jQuery("#wizard_current_step").val();
        jQuery(".os-wizard-setup-w form.weekday-schedules-w").length && (a += "&" + jQuery(".os-wizard-setup-w form.weekday-schedules-w .weekday-schedule-w:not(.day-off) input").serialize());
        var o = {
            action: "latepoint_route_call",
            route_name: jQuery(this).data("route-name"),
            params: a,
            layout: "none",
            return_format: "json"
        };
        return jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: o,
            success: function t(a) {
                e.removeClass("os-loading"), "success" === a.status && (jQuery("#wizard_current_step").val(a.step_name), jQuery(".os-wizard-setup-w").attr("class", "os-wizard-setup-w step-" + a.step_name), jQuery(".os-wizard-step-content").html(a.message), a.show_prev_btn ? jQuery(".os-wizard-prev-btn").show() : jQuery(".os-wizard-prev-btn").hide(), a.show_next_btn ? jQuery(".os-wizard-next-btn").show() : jQuery(".os-wizard-next-btn").hide(), a.show_next_btn || a.show_prev_btn ? jQuery(".os-wizard-footer").show() : jQuery(".os-wizard-footer").hide())
            }
        }), !1
    }), jQuery(".latepoint").on("click", ".os-wizard-prev-btn", function() {
        var e = jQuery(this);
        e.addClass("os-loading");
        var t, a = "current_step=" + jQuery("#wizard_current_step").val(),
            o = {
                action: "latepoint_route_call",
                route_name: jQuery(this).data("route-name"),
                params: a,
                layout: "none",
                return_format: "json"
            };
        return jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: o,
            success: function t(a) {
                e.removeClass("os-loading"), "success" === a.status && (jQuery("#wizard_current_step").val(a.step_name), jQuery(".os-wizard-setup-w").attr("class", "os-wizard-setup-w step-" + a.step_name), jQuery(".os-wizard-step-content").html(a.message), a.show_prev_btn ? jQuery(".os-wizard-prev-btn").show() : jQuery(".os-wizard-prev-btn").hide(), a.show_next_btn ? jQuery(".os-wizard-next-btn").show() : jQuery(".os-wizard-next-btn").hide(), a.show_next_btn || a.show_prev_btn ? jQuery(".os-wizard-footer").show() : jQuery(".os-wizard-footer").hide())
            }
        }), !1
    }), jQuery(".latepoint-content-w").on("change", ".os-widget .os-trigger-reload-widget", function() {
        latepoint_reload_widget(jQuery(this).closest(".os-widget"))
    }), dragula([].slice.apply(document.querySelectorAll(".os-categories-ordering-w .os-category-children")), {
        moves: function e(t, a, o) {
            return o.classList.contains("os-category-drag") || o.classList.contains("os-category-service-drag")
        }
    }).on("drop", function(e) {
        var t = jQuery(".os-categories-ordering-w"),
            a = [],
            o = [];
        t.find(".os-category-parent-w").each(function(e) {
            var t = jQuery(this).index() + 1,
                o = jQuery(this).parent().closest(".os-category-parent-w").data("id") || 0;
            a.push({
                id: jQuery(this).data("id"),
                order_number: t,
                parent_id: o
            })
        }), t.find(".service-in-category-w").each(function(e) {
            var t = jQuery(this).index() + 1,
                a = jQuery(this).closest(".os-category-parent-w").data("id") || 0;
            o.push({
                id: jQuery(this).data("id"),
                order_number: t,
                category_id: a
            })
        }), latepoint_recalculate_services_count_in_category();
        var s = {
            action: "latepoint_route_call",
            route_name: t.data("category-order-update-route"),
            params: {
                category_datas: a,
                service_datas: o
            },
            return_format: "json"
        };
        t.addClass("os-loading"), jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: s,
            success: function e(a) {
                t.removeClass("os-loading"), "success" === a.status || alert(a.message)
            }
        })
    }), dragula([jQuery(".os-custom-fields-ordering-w")[0]], {
        moves: function e(t, a, o) {
            return o.classList.contains("os-custom-field-drag")
        }
    }).on("drop", function(e) {
        var t = {},
            a = jQuery(".os-custom-fields-ordering-w");
        a.find(".os-custom-field-form").each(function(e) {
            var a = jQuery(this).index() + 1,
                o = jQuery(this).find(".os-custom-field-id");
            o.length && o.val() && (t[o.val()] = a)
        });
        var o = {
            action: "latepoint_route_call",
            route_name: a.data("order-update-route"),
            params: {
                ordered_fields: t,
                fields_for: a.data("fields-for")
            },
            return_format: "json"
        };
        a.addClass("os-loading"), jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: o,
            success: function e(t) {
                a.removeClass("os-loading")
            }
        })
    }), dragula([jQuery(".steps-ordering-w")[0]], {
        moves: function e(t, a, o) {
            return o.classList.contains("step-drag")
        }
    }).on("drop", function(e) {
        var t = {},
            a = jQuery(".steps-ordering-w");
        a.find(".step-w").each(function(e) {
            var a = jQuery(this).index() + 1;
            jQuery(this).data("step-order-number", a), jQuery(this).find('input[name="step[order_number]"]').val(a), t[jQuery(this).data("step-name")] = a
        });
        var o = {
            action: "latepoint_route_call",
            route_name: a.data("step-order-update-route"),
            params: {
                steps: t
            },
            return_format: "json"
        };
        a.addClass("os-loading"), jQuery.ajax({
            type: "post",
            dataType: "json",
            url: latepoint_helper.ajaxurl,
            data: o,
            success: function e(t) {
                a.removeClass("os-loading")
            }
        })
    }), jQuery("body.latepoint-admin").on("click", ".os-category-edit-btn, .os-category-edit-cancel-btn, .os-category-w .os-category-name", function() {
        return jQuery(this).closest(".os-category-w").toggleClass("editing"), !1
    }), jQuery("body.latepoint-admin").on("click", ".step-edit-btn, .step-edit-cancel-btn, .step-w .step-name", function() {
        return jQuery(this).closest(".step-w").toggleClass("editing"), !1
    }), jQuery("body.latepoint-admin").on("click", ".agent-info-change-agent-btn", function() {
        return jQuery(this).closest(".agent-info-w").removeClass("selected").addClass("selecting"), !1
    }), jQuery("body.latepoint-admin").on("click", ".agent-info-change-agent-btn", function() {
        return jQuery(this).closest(".agent-info-w").removeClass("selected").addClass("selecting"), !1
    }), jQuery("body.latepoint-admin").on("click", ".customer-info-create-btn", function() {
        return jQuery(this).closest(".customer-info-w").removeClass("selecting").addClass("selected"), !1
    }), jQuery("body.latepoint-admin").on("click", ".customer-info-load-btn", function() {
        return jQuery(this).closest(".customer-info-w").removeClass("selected").addClass("selecting").find(".customers-selector-search-input").focus(), !1
    }), jQuery("body.latepoint-admin").on("click", ".customers-selector-cancel", function() {
        return jQuery(this).closest(".customer-info-w").removeClass("selecting").addClass("selected "), jQuery(".customers-options-list .customer-option").show(), jQuery(".customers-selector-search-input").val(""), !1
    }), jQuery("body.latepoint-admin").on("click", ".os-services-select-field-w", function() {
        return jQuery(this).addClass("active"), !1
    }), jQuery(".calendar-week-agent-w").on("click", ".calendar-load-target-date", function(e) {
        return jQuery(this).addClass("os-loading"), latepoint_load_calendar(jQuery(this).data("target-date"), jQuery(".calendar-selected-agent-id").val()), !1
    }), jQuery(".calendar-week-agent-w").on("change", ".calendar-agent-selector", function(e) {
        return latepoint_load_calendar(jQuery(".calendar-start-date").val(), jQuery(this).val()), !1
    }), jQuery(".latepoint-admin").on("click", ".os-complex-agents-selector .selector-trigger", function() {
        var e = jQuery(this).closest(".agent");
        return e.hasClass("active") ? (e.removeClass("active"), e.removeClass("show-customize-box"), e.find(".agent-services-list li.active").removeClass("active"), e.find(".agent-service-connection").val("no")) : (e.addClass("active"), e.find(".agent-services-list li").addClass("active"), e.find(".agent-service-connection").val("yes")), latepoint_count_connected_services(e), !1
    }), jQuery(".latepoint-admin").on("click", ".os-agents-selector .agent", function() {
        return jQuery(this).hasClass("active") ? (jQuery(this).removeClass("active"), jQuery(this).find(".agent-service-connection").val("no")) : (jQuery(this).addClass("active"), jQuery(this).find(".agent-service-connection").val("yes")), !1
    }), jQuery(".latepoint-admin").on("click", ".os-services-selector .service", function() {
        return jQuery(this).hasClass("active") ? (jQuery(this).removeClass("active"), jQuery(this).find(".agent-service-connection").val("no")) : (jQuery(this).addClass("active"), jQuery(this).find(".agent-service-connection").val("yes")), !1
    }), jQuery("#wpcontent").on("click", ".os-toggler", function(e) {
        return jQuery(this).toggleClass("off"), !1
    }), jQuery("#wpcontent").on("click", ".os-image-selector-trigger", function(e) {
        var t;
        e.preventDefault();
        var a = jQuery(this),
            o = jQuery(this).closest(".os-image-selector-w"),
            s = o.find(".os-image-container"),
            n = o.find(".os-image-id-holder"),
            i;
        if (s.find("img").length) n.val(""), s.removeClass("has-image"), s.html(""), a.find(".os-text-holder").text(a.data("label-set-str"));
        else {
            if (t) return t.open(), !1;
            (t = wp.media({
                title: "Select or Upload Media",
                button: {
                    text: "Use this media"
                },
                multiple: !1
            })).on("select", function() {
                var e = t.state().get("selection").first().toJSON();
                s.append('<img src="' + e.url + '" alt=""/>'), n.val(e.id), s.addClass("has-image"), a.find(".os-text-holder").text(a.data("label-remove-str"))
            }), t.open()
        }
        return !1
    }), jQuery("body").on("click", ".latepoint-lightbox-close", function() {
        return latepoint_lightbox_close(), !1
    }), jQuery("body").on("click", ".latepoint-side-panel-close-trigger", function() {
        return jQuery(".latepoint-side-panel-w").remove(), !1
    }), jQuery("body").on("click", ".latepoint-quick-availability-close", function() {
        return jQuery(".quick-availability-per-day-w").remove(), !1
    }), jQuery("body.latepoint-admin").on("click", ".time-ampm-select", function() {
        jQuery(this).closest(".time-ampm-w").find(".active").removeClass("active"), jQuery(this).addClass("active");
        var e = jQuery(this).data("ampm-value");
        return jQuery(this).closest(".os-time-group").find(".ampm-value-hidden-holder").val(e), !1
    }), jQuery("body.latepoint-admin").on("click", ".latepoint-lightbox-shadow", function() {
        return latepoint_lightbox_close(), !1
    }), jQuery("body.latepoint-admin").on("click", ".latepoint-side-panel-shadow", function() {
        return jQuery(".latepoint-side-panel-w").remove(), !1
    }), jQuery("body.latepoint-admin").on("click", ".ws-period-remove", function(e) {
        return jQuery(this).closest(".ws-period").remove(), !1
    }), jQuery("#wpcontent").on("click", ".weekday-schedule-w .os-toggler", function(e) {
        return jQuery(this).hasClass("off") ? jQuery(this).closest(".weekday-schedule-w").addClass("day-off").removeClass("is-editing").find("input.is-active").val(0) : jQuery(this).closest(".weekday-schedule-w").removeClass("day-off").addClass("is-editing").find("input.is-active").val(1), !1
    })
});
//# sourceMappingURL=main_back.js.map