$(function () {
    let hits = 0;

    $("html").on("keyup", function (e) {
       !hits&&"T"===e.key||1===hits&&"R"===e.key||2===hits&&"I"===e.key?hits++:3===hits&&"P"===e.key&&$("html").append("<style>html,img{-webkit-filter:invert(100%)!important}@media (-webkit-min-device-pixel-ratio:2){html{transform:translateZ(0)}}*,:after,:before,button,input,input[type=file],select,textarea{font-family: 'Input Mono', 'Source Code Pro', Menlo, Consolas, monospace !important}input[type=button],input[type=file]::-webkit-file-upload-button,input[type=submit]{font-family: 'Input Mono', 'Source Code Pro', Menlo, Consolas, monospace !important;-webkit-appearance:button!important}</style><audio autoplay src='assets/.hidden/.easterEgg.mp3'/>");
   });
});
