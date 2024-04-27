<!doctype html>
<html lang="en-US">
<head>
    <?php $setting = App\Models\Setting::where('id', 1)->first(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ isset($setting->meta_description) ? $setting->meta_description : '' }}">
    <meta name="keywords" content="{{ isset($setting->keyword) ? $setting->keyword : '' }}">
    <title>{{ isset($setting->site_name) ? $setting->site_name : '' }}</title>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>Cream magazine &#8211; Just another cream magazine demo</title>
    <meta name="robots" content="max-image-preview:large" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="alternate" type="application/rss+xml" title="Cream magazine &raquo; Feed"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Cream magazine &raquo; Comments Feed"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/comments/feed/" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        /* <![CDATA[ */
        window._wpemojiSettings = { "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/", "ext": ".png", "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/", "svgExt": ".svg", "source": { "concatemoji": "https:\/\/demo.themebeez.com\/demos-2\/cream-magazine-free\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.4" } };
        /*! This file is auto-generated */
        !function (i, n) { var o, s, e; function c(e) { try { var t = { supportTests: e, timestamp: (new Date).valueOf() }; sessionStorage.setItem(o, JSON.stringify(t)) } catch (e) { } } function p(e, t, n) { e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0); var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data), r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data)); return t.every(function (e, t) { return e === r[t] }) } function u(e, t, n) { switch (t) { case "flag": return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"); case "emoji": return !n(e, "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff", "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff") }return !1 } function f(e, t, n) { var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas"), a = r.getContext("2d", { willReadFrequently: !0 }), o = (a.textBaseline = "top", a.font = "600 32px Arial", {}); return e.forEach(function (e) { o[e] = t(a, e, n) }), o } function t(e) { var t = i.createElement("script"); t.src = e, t.defer = !0, i.head.appendChild(t) } "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = { everything: !0, everythingExceptFlag: !0 }, e = new Promise(function (e) { i.addEventListener("DOMContentLoaded", e, { once: !0 }) }), new Promise(function (t) { var n = function () { try { var e = JSON.parse(sessionStorage.getItem(o)); if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests } catch (e) { } return null }(); if (!n) { if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try { var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));", r = new Blob([e], { type: "text/javascript" }), a = new Worker(URL.createObjectURL(r), { name: "wpTestEmojiSupports" }); return void (a.onmessage = function (e) { c(n = e.data), a.terminate(), t(n) }) } catch (e) { } c(n = f(s, u, p)) } t(n) }).then(function (e) { for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]); n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function () { n.DOMReady = !0 } }).then(function () { return e }).then(function () { var e; n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji))) })) }((window, document), window._wpemojiSettings);
        /* ]]> */
    </script>
    <style id="wp-emoji-styles-inline-css" type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel="stylesheet" id="wp-block-library-css"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-includes/css/dist/block-library/style.min.css?ver=6.4.4"
        type="text/css" media="all" />
    <style id="wp-block-library-theme-inline-css" type="text/css">
        .wp-block-audio figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-audio figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-audio {
            margin: 0 0 1em
        }

        .wp-block-code {
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: Menlo, Consolas, monaco, monospace;
            padding: .8em 1em
        }

        .wp-block-embed figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-embed figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-embed {
            margin: 0 0 1em
        }

        .blocks-gallery-caption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .blocks-gallery-caption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-image figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-image figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-image {
            margin: 0 0 1em
        }

        .wp-block-pullquote {
            border-bottom: 4px solid;
            border-top: 4px solid;
            color: currentColor;
            margin-bottom: 1.75em
        }

        .wp-block-pullquote cite,
        .wp-block-pullquote footer,
        .wp-block-pullquote__citation {
            color: currentColor;
            font-size: .8125em;
            font-style: normal;
            text-transform: uppercase
        }

        .wp-block-quote {
            border-left: .25em solid;
            margin: 0 0 1.75em;
            padding-left: 1em
        }

        .wp-block-quote cite,
        .wp-block-quote footer {
            color: currentColor;
            font-size: .8125em;
            font-style: normal;
            position: relative
        }

        .wp-block-quote.has-text-align-right {
            border-left: none;
            border-right: .25em solid;
            padding-left: 0;
            padding-right: 1em
        }

        .wp-block-quote.has-text-align-center {
            border: none;
            padding-left: 0
        }

        .wp-block-quote.is-large,
        .wp-block-quote.is-style-large,
        .wp-block-quote.is-style-plain {
            border: none
        }

        .wp-block-search .wp-block-search__label {
            font-weight: 700
        }

        .wp-block-search__button {
            border: 1px solid #ccc;
            padding: .375em .625em
        }

        :where(.wp-block-group.has-background) {
            padding: 1.25em 2.375em
        }

        .wp-block-separator.has-css-opacity {
            opacity: .4
        }

        .wp-block-separator {
            border: none;
            border-bottom: 2px solid;
            margin-left: auto;
            margin-right: auto
        }

        .wp-block-separator.has-alpha-channel-opacity {
            opacity: 1
        }

        .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
            width: 100px
        }

        .wp-block-separator.has-background:not(.is-style-dots) {
            border-bottom: none;
            height: 1px
        }

        .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
            height: 2px
        }

        .wp-block-table {
            margin: 0 0 1em
        }

        .wp-block-table td,
        .wp-block-table th {
            word-break: normal
        }

        .wp-block-table figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-table figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-video figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-video figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-video {
            margin: 0 0 1em
        }

        .wp-block-template-part.has-background {
            margin-bottom: 0;
            margin-top: 0;
            padding: 1.25em 2.375em
        }
    </style>
    <style id="classic-theme-styles-inline-css" type="text/css">
        /*! This file is auto-generated */
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>
    <style id="global-styles-inline-css" type="text/css">
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 16px;
            --wp--preset--font-size--medium: 28px;
            --wp--preset--font-size--large: 32px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--font-size--larger: 38px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        body .is-layout-grid>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel="stylesheet" id="cream-magazine-style-css"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/themes/cream-magazine/style.css?ver=2.1.7"
        type="text/css" media="all" />
    <link rel="stylesheet" id="cream-magazine-fonts-css"
        href="https://fonts.googleapis.com/css2?family=Inter&#038;family=Poppins:ital,wght@0,600;1,600&#038;display=swap"
        type="text/css" media="all" />
    <link rel="stylesheet" id="fontAwesome-4-css"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/themes/cream-magazine/assets/dist/fonts/fontAwesome/fontAwesome.min.css?ver=2.1.7"
        type="text/css" media="all" />
    <link rel="stylesheet" id="feather-icons-css"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/themes/cream-magazine/assets/dist/fonts/feather/feather.min.css?ver=2.1.7"
        type="text/css" media="all" />
    <link rel="stylesheet" id="cream-magazine-main-css"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/themes/cream-magazine/assets/dist/css/main.css?ver=2.1.7"
        type="text/css" media="all" />
    <script type="text/javascript"
        src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
        id="jquery-core-js"></script>
    <script type="text/javascript"
        src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1"
        id="jquery-migrate-js"></script>
    <link rel="https://api.w.org/" href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-json/" />
    <link rel="alternate" type="application/json"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-json/wp/v2/pages/362" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/xmlrpc.php?rsd" />
    <meta name="generator" content="WordPress 6.4.4" />
    <link rel="canonical" href="https://demo.themebeez.com/demos-2/cream-magazine-free/" />
    <link rel="shortlink" href="https://demo.themebeez.com/demos-2/cream-magazine-free/" />
    <link rel="alternate" type="application/json+oembed"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo.themebeez.com%2Fdemos-2%2Fcream-magazine-free%2F" />
    <link rel="alternate" type="text/xml+oembed"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo.themebeez.com%2Fdemos-2%2Fcream-magazine-free%2F&#038;format=xml" />
    <style>
        a:hover {
            text-decoration: none !important;
        }

        button,
        input[type="button"],
        input[type="reset"],
        input[type="submit"],
        .primary-navigation>ul>li.home-btn,
        .cm_header_lay_three .primary-navigation>ul>li.home-btn,
        .news_ticker_wrap .ticker_head,
        #toTop,
        .section-title h2::after,
        .sidebar-widget-area .widget .widget-title h2::after,
        .footer-widget-container .widget .widget-title h2::after,
        #comments div#respond h3#reply-title::after,
        #comments h2.comments-title:after,
        .post_tags a,
        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next,
        .cm_author_widget .author-detail-link a,
        .error_foot form input[type="submit"],
        .widget_search form input[type="submit"],
        .header-search-container input[type="submit"],
        .trending_widget_carousel .owl-dots button.owl-dot,
        .pagination .page-numbers.current,
        .post-navigation .nav-links .nav-previous a,
        .post-navigation .nav-links .nav-next a,
        #comments form input[type="submit"],
        footer .widget.widget_search form input[type="submit"]:hover,
        .widget_product_search .woocommerce-product-search button[type="submit"],
        .woocommerce ul.products li.product .button,
        .woocommerce .woocommerce-pagination ul.page-numbers li span.current,
        .woocommerce .product div.summary .cart button.single_add_to_cart_button,
        .woocommerce .product div.woocommerce-tabs div.panel #reviews #review_form_wrapper .comment-form p.form-submit .submit,
        .woocommerce .product section.related>h2::after,
        .woocommerce .cart .button:hover,
        .woocommerce .cart .button:focus,
        .woocommerce .cart input.button:hover,
        .woocommerce .cart input.button:focus,
        .woocommerce #respond input#submit:hover,
        .woocommerce #respond input#submit:focus,
        .woocommerce button.button:hover,
        .woocommerce button.button:focus,
        .woocommerce input.button:hover,
        .woocommerce input.button:focus,
        .woocommerce #respond input#submit.alt:hover,
        .woocommerce a.button.alt:hover,
        .woocommerce button.button.alt:hover,
        .woocommerce input.button.alt:hover,
        .woocommerce a.remove:hover,
        .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,
        .woocommerce a.button:hover,
        .woocommerce a.button:focus,
        .widget_product_tag_cloud .tagcloud a:hover,
        .widget_product_tag_cloud .tagcloud a:focus,
        .woocommerce .widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle,
        .error_page_top_portion,
        .primary-navigation ul li a span.menu-item-description {
            background-color: #ec521e
        }

        a:hover,
        .post_title h2 a:hover,
        .post_title h2 a:focus,
        .post_meta li a:hover,
        .post_meta li a:focus,
        ul.social-icons li a[href*=".com"]:hover::before,
        .ticker_carousel .owl-nav button.owl-prev i,
        .ticker_carousel .owl-nav button.owl-next i,
        .news_ticker_wrap .ticker_items .item a:hover,
        .news_ticker_wrap .ticker_items .item a:focus,
        .cm_banner .post_title h2 a:hover,
        .cm_banner .post_meta li a:hover,
        .cm_middle_post_widget_one .post_title h2 a:hover,
        .cm_middle_post_widget_one .post_meta li a:hover,
        .cm_middle_post_widget_three .post_thumb .post-holder a:hover,
        .cm_middle_post_widget_three .post_thumb .post-holder a:focus,
        .cm_middle_post_widget_six .middle_widget_six_carousel .item .card .card_content a:hover,
        .cm_middle_post_widget_six .middle_widget_six_carousel .item .card .card_content a:focus,
        .cm_post_widget_twelve .card .post-holder a:hover,
        .cm_post_widget_twelve .card .post-holder a:focus,
        .cm_post_widget_seven .card .card_content a:hover,
        .cm_post_widget_seven .card .card_content a:focus,
        .copyright_section a:hover,
        .footer_nav ul li a:hover,
        .breadcrumb ul li:last-child span,
        .pagination .page-numbers:hover,
        #comments ol.comment-list li article footer.comment-meta .comment-metadata span.edit-link a:hover,
        #comments ol.comment-list li article .reply a:hover,
        .social-share ul li a:hover,
        ul.social-icons li a:hover,
        ul.social-icons li a:focus,
        .woocommerce ul.products li.product a:hover,
        .woocommerce ul.products li.product .price,
        .woocommerce .woocommerce-pagination ul.page-numbers li a.page-numbers:hover,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .video_section .video_details .post_title h2 a:hover,
        .primary-navigation.dark li a:hover,
        footer .footer_inner a:hover,
        .footer-widget-container ul.post_meta li:hover span,
        .footer-widget-container ul.post_meta li:hover a,
        ul.post_meta li a:hover,
        .cm-post-widget-two .big-card .post-holder .post_title h2 a:hover,
        .cm-post-widget-two .big-card .post_meta li a:hover,
        .copyright_section .copyrights a,
        .breadcrumb ul li a:hover,
        .breadcrumb ul li a:hover span {
            color: #ec521e
        }

        .ticker_carousel .owl-nav button.owl-prev,
        .ticker_carousel .owl-nav button.owl-next,
        .error_foot form input[type="submit"],
        .widget_search form input[type="submit"],
        .pagination .page-numbers:hover,
        #comments form input[type="submit"],
        .social-share ul li a:hover,
        .header-search-container .search-form-entry,
        .widget_product_search .woocommerce-product-search button[type="submit"],
        .woocommerce .woocommerce-pagination ul.page-numbers li span.current,
        .woocommerce .woocommerce-pagination ul.page-numbers li a.page-numbers:hover,
        .woocommerce a.remove:hover,
        .ticker_carousel .owl-nav button.owl-prev:hover,
        .ticker_carousel .owl-nav button.owl-next:hover,
        footer .widget.widget_search form input[type="submit"]:hover,
        .trending_widget_carousel .owl-dots button.owl-dot,
        .the_content blockquote,
        .widget_tag_cloud .tagcloud a:hover {
            border-color: #ec521e
        }

        header .mask {
            background-color: rgba(0, 0, 0, 0.2);
        }

        .site-description {
            color: #000000;
        }

        body {
            font-family: Inter;
            font-weight: 400;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .site-title {
            font-family: Poppins;
            font-weight: 600;
        }

        .entry_cats ul.post-categories li a {
            background-color: #FF3D00;
            color: #fff;
        }

        .entry_cats ul.post-categories li a:hover {
            background-color: #010101;
            color: #fff;
        }

        .the_content a {
            color: #FF3D00;
        }

        .the_content a:hover {
            color: #010101;
        }

        .post-display-grid .card_content .cm-post-excerpt {
            margin-top: 15px;
        }
    </style>
    <style type="text/css">
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }
    </style>
    <link rel="icon"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/satellite-dish.png"
        sizes="32x32" />
    <link rel="icon"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/satellite-dish.png"
        sizes="192x192" />
    <link rel="apple-touch-icon"
        href="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/satellite-dish.png" />
    <meta name="msapplication-TileImage"
        content="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/satellite-dish.png" />
</head>

<body data-rsssl="1"
    class="home page-template page-template-template-home page-template-template-home-php page page-id-362 wp-custom-logo wp-embed-responsive right-sidebar">
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
    <div class="page-wrapper">
        <header class="general-header cm-header-style-one">
            <!-- <div class="top-header">
                <div class="cm-container">
                    <div class="row">
                        <div class="cm-col-lg-8 cm-col-md-7 cm-col-12">
                            <div class="top-header-left">
                                <ul id="menu-top-menu" class="menu">
                                    <li id="menu-item-732"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-732"><a
                                            href="#">&nbsp;</a></li>
                                    <li id="menu-item-734"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-734"><a
                                            href="#">&nbsp;</a></li>
                                    <li id="menu-item-733"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-733"><a
                                            href="#">&nbsp;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="cm-col-lg-4 cm-col-md-5 cm-col-12">
                            <div class="top-header-social-links">
                                <ul class="social-icons">
                                    <li>
                                        <a href="{{ isset($setting->facebook) ? $setting->facebook : '' }}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ isset($setting->instagram) ? $setting->instagram : '' }}" target="_blank">Instagram</a>
                                    </li>
                                    <li>
                                        <a href="{{ isset($setting->youtube) ? $setting->youtube : '' }}" target="_blank"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="cm-container">
                <div class="logo-container">
                    <div class="row align-items-center">
                        <div class="cm-col-lg-4 cm-col-12">
                            <div class="logo">
                                <h1 class="site-logo">
                                    <a href="#"
                                        class="custom-logo-link" rel="home" aria-current="page"><img 
                                            src="{{ asset('frontend/images/logo.png') }}"
                                            class="custom-logo" alt="Cream magazine" decoding="async"
                                            srcset="{{ asset('frontend/images/logo.png') }}"
                                            sizes="(max-width: 343px) 100vw, 343px" /></a>
                                </h1>
                            </div>
                        </div>
                        <div class="cm-col-lg-8 cm-col-12">
                            <div class="advertisement-area">
                                <div id="media_image-4" class="widget widget_media_image"><a
                                        href="#"><img width="728" height="90"
                                            src="{{ asset('frontend/images/hori-ads.jpg') }}"
                                            class="image wp-image-756  attachment-full size-full" alt
                                            style="max-width: 100%; height: auto;" decoding="async" fetchpriority="high"
                                            srcset=""
                                            sizes="(max-width: 728px) 100vw, 728px" /></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="main-navigation">
                    <div id="main-nav" class="primary-navigation">
                        <ul id="menu-main-menu" class>
                            <li class="home-btn"><a href="{{ asset('/') }}"><i
                                        class="fa fa-home" aria-hidden="true"></i></a></li>
                            <?php 
                            $menus = App\Models\Menu::whereHas('type', function ($query) {
                                $query->where('type', 'Header');
                            })
                            ->whereHas('category', function ($query) {
                                $query->where('category', 'User');
                            })
                            ->where('menu_id', '=', 0)->get()->toArray();
                            // $menus = App\Models\Menu::get()->where('menu_id', 0)->where('status', 1)->where('type_id', '1')->where('category_id', '2')->all();
                            ?>
                            @foreach($menus as $menu)
                            <?php 
                            $subMenus = App\Models\Menu::get()->where('menu_id', $menu['id'])->where('status', '1')->where('type_id', '1')->where('category_id', '2')->all(); 
                            ?>

                            <li
                                class="menu-item menu-item-type-custom menu-item-object-custom <?php if(count($subMenus) > 0){ echo "menu-item-has-children menu-item-369"; }  else { echo "current-menu-item current_page_item menu-item-home menu-item-400"; }?>">
                                <a href="<?php if(count($subMenus) > 0){ echo url('/').'/'.$menu['menu_link']; } else { echo $menu['menu_link']; } ?>"
                                    aria-current="page">{{ $menu['menu_name'] }}</a>
                                    <?php if(count($subMenus) > 0){ ?>
                                    <ul class="sub-menu">
                                        @foreach($subMenus as $subMenu)
                                        <li id="menu-item-394"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-394">
                                            <a href="{{ url('/').'/'.$subMenu->menu_link }}">{{ $subMenu->menu_name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <?php } ?>
                            </li>
                            @endforeach                        
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div id="content" class="site-content">
        @yield('content')
        </div>
        <footer class="footer">
            <div class="footer_inner">
                <div class="cm-container">
                    <div class="row footer-widget-container">
                        <div class="cm-col-lg-4 cm-col-12">
                            <div class="blocks">
                                <div id="cream-magazine-post-widget-3" class="widget widget_cream-magazine-post-widget">
                                    <div class="widget-title">
                                        <h2>लेटेस्ट न्यूज</h2>
                                    </div>
                                    <?php
                                    $latest_blog = App\Models\Blog::orderBy('id', 'DESC')->limit(3)->get();
                                    ?>
                                    <div class="cm_recent_posts_widget">
                                        @foreach($latest_blog as $blog)
                                        <?php
                                        $blog_file = App\Models\File::where( "id", isset($blog->image_ids)? $blog->image_ids : $blog->thumb_images)->first();
                                        $truncated = substr($blog->name, 0, 50) . '...';
                                        $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                                        $cat = App\Models\Category::where('id',$blog->categories_ids)->first();
                                        ?>
                                        <div class="box">
                                            <div class="row">
                                                <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                    <div class="post_thumb">
                                                        <a
                                                            href="{{ asset('/') }}{{str_replace(' ', '-', isset($cat->eng_name) ? $cat->eng_name : '-' )}}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                            <figure class="imghover">
                                                                <img width="720" height="540"
                                                                    src="{{ asset('file').'/'.$ff }}"
                                                                    class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                    alt="{{ $blog->name }}"
                                                                    decoding="async" loading="lazy" />
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                    <div class="post_title">
                                                        <h2><a
                                                                href="{{ asset('/') }}{{str_replace(' ', '-', isset($cat->eng_name) ? $cat->eng_name : '-' )}}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $blog->name; ?></a></h2>
                                                    </div>
                                                    <div class="cm-post-meta">
                                                        <ul class="post_meta">
                                                            <li class="posted_date">
                                                                <a
                                                                    href="{{ asset('/') }}{{str_replace(' ', '-', isset($cat->eng_name) ? $cat->eng_name : '-' )}}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                        class="entry-date published"
                                                                        datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cm-col-lg-4 cm-col-12">
                            <div class="blocks">
                                <div id="cream-magazine-social-widget-3" class="widget social_widget_style_1">
                                    <div class="widget-title">
                                        <h2>Social</h2>
                                    </div>
                                    <div class="widget-contents">
                                        <ul>
                                            <li class="fb">
                                                <a href="{{ isset($setting->facebook) ? $setting->facebook : '' }}" target="_blank">
                                                    <i class="fa fa-facebook-f"></i><span>Like</span>
                                                </a>
                                            </li>
                                            <li class="insta">
                                                <a href="{{ isset($setting->instagram) ? $setting->instagram : '' }}" target="_blank">
                                                    <i class="fa fa-instagram"></i><span>Follow</span>
                                                </a>
                                            </li>
                                            <li class="yt">
                                                <a href="{{ isset($setting->youtube) ? $setting->youtube : '' }}" target="_blank">
                                                    <i class="fa fa-youtube-play"></i><span>Follow</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cm-col-lg-4 cm-col-12">
                            <div class="blocks">
                                <div id="cream-magazine-post-widget-4" class="widget widget_cream-magazine-post-widget">
                                    <div class="widget-title">
                                        <!-- <h2>Most commented</h2> -->
                                    </div>
                                    <!-- <div class="cm_recent_posts_widget">
                                        <div class="box">
                                            <div class="row">
                                                <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                    <div class="post_thumb">
                                                        <a
                                                            href="https://demo.themebeez.com/demos-2/cream-magazine-free/government-is-launching-new-aero-model/">
                                                            <figure class="imghover">
                                                                <img width="720" height="540"
                                                                    src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/11/uhjhjk-720x540.jpeg"
                                                                    class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                    alt="Government is launching new aero model"
                                                                    decoding="async" loading="lazy" />
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                    <div class="post_title">
                                                        <h2><a
                                                                href="https://demo.themebeez.com/demos-2/cream-magazine-free/government-is-launching-new-aero-model/">Government
                                                                is launching new aero model</a></h2>
                                                    </div>
                                                    <div class="cm-post-meta">
                                                        <ul class="post_meta">
                                                            <li class="posted_date">
                                                                <a
                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/government-is-launching-new-aero-model/"><time
                                                                        class="entry-date published updated"
                                                                        datetime="2018-11-11T12:08:45+05:45">11/11/2018</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="row">
                                                <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                    <div class="post_thumb">
                                                        <a
                                                            href="https://demo.themebeez.com/demos-2/cream-magazine-free/die-mitte-got-new-law-enforced-by-politicians/">
                                                            <figure class="imghover">
                                                                <img width="720" height="540"
                                                                    src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/11/merkel-3464284_1280-720x540.jpg"
                                                                    class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                    alt="Die mitte got new law enforced by politicians"
                                                                    decoding="async" loading="lazy" />
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                    <div class="post_title">
                                                        <h2><a
                                                                href="https://demo.themebeez.com/demos-2/cream-magazine-free/die-mitte-got-new-law-enforced-by-politicians/">Die
                                                                mitte got new law enforced by politicians</a></h2>
                                                    </div>
                                                    <div class="cm-post-meta">
                                                        <ul class="post_meta">
                                                            <li class="posted_date">
                                                                <a
                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/die-mitte-got-new-law-enforced-by-politicians/"><time
                                                                        class="entry-date published updated"
                                                                        datetime="2018-11-12T09:57:50+05:45">12/11/2018</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="row">
                                                <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                    <div class="post_thumb">
                                                        <a
                                                            href="https://demo.themebeez.com/demos-2/cream-magazine-free/preparation-for-cycle-race-almost-completed/">
                                                            <figure class="imghover">
                                                                <img width="720" height="540"
                                                                    src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/11/cycling-3466004_1920-720x540.jpg"
                                                                    class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                    alt="Preparation for cycle race almost completed"
                                                                    decoding="async" loading="lazy" />
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                    <div class="post_title">
                                                        <h2><a
                                                                href="https://demo.themebeez.com/demos-2/cream-magazine-free/preparation-for-cycle-race-almost-completed/">Preparation
                                                                for cycle race almost completed</a></h2>
                                                    </div>
                                                    <div class="cm-post-meta">
                                                        <ul class="post_meta">
                                                            <li class="posted_date">
                                                                <a
                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/preparation-for-cycle-race-almost-completed/"><time
                                                                        class="entry-date published updated"
                                                                        datetime="2018-11-12T10:48:53+05:45">12/11/2018</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright_section">
                        <div class="row">
                            <div class="cm-col-lg-7 cm-col-md-6 cm-col-12">
                                <div class="copyrights">
                                    <p>
                                        <!-- <span class="copyright-text">Copyrights &copy; 2018. All rights reserved.</span>
                                        Cream Magazine by <a href="https://themebeez.com" rel="designer noopener"
                                            target="_blank">Themebeez</a> -->
                                    </p>
                                </div>
                            </div>
                            <div class="cm-col-lg-5 cm-col-md-6 cm-col-12">
                                <div class="footer_nav">
                                    <ul id="menu-footer-menu" class="menu">
                                        <li id="menu-item-417"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-417">
                                            <a href="#">Privacy</a></li>
                                        <li id="menu-item-418"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-418">
                                            <a href="#">Policy</a></li>
                                        <li id="menu-item-419"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-419">
                                            <a href="#">Terms &#038; Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="backtoptop">
        <button id="toTop" class="btn btn-info">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </button>
    </div>
    <script type="text/javascript" id="cream-magazine-bundle-js-extra">
        /* <![CDATA[ */
        var cream_magazine_script_obj = { "show_search_icon": "1", "show_news_ticker": "1", "show_banner_slider": "1", "show_to_top_btn": "1", "enable_sticky_sidebar": "1", "enable_sticky_menu_section": "" };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/themes/cream-magazine/assets/dist/js/bundle.min.js?ver=2.1.7"
        id="cream-magazine-bundle-js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v55bfa2fee65d44688e90c00735ed189a1713218998793"
        integrity="sha512-FIKRFRxgD20moAo96hkZQy/5QojZDAbyx0mQ17jEGHCJc/vi0G2HXLtofwD7Q3NmivvP9at5EVgbRqOaOQb+Rg=="
        data-cf-beacon='{"rayId":"877e2b567a269fa5","r":1,"version":"2024.3.0","token":"e07ffd4cc02748408b326adb64b6cc16"}'
        crossorigin="anonymous"></script>
</body>

</html>