<div class="animation-bg"></div>
<div class="animation-bg02"></div>

.curtain .animation-bg, .curtain .animation-bg02 {
display: none;
}
body.appear.curtain .animation-bg, body.appear.curtain .animation-bg02 {
display: block;
}
.curtain .animation-bg, .curtain .animation-bg02 {
background: #ff97bd;
content: "";
position: fixed;
z-index: 999;
width: 100%;
height: 100vh;
top: 0;
transform: scaleX(1);
animation-duration: 1.2s;
animation-timing-function: ease-in-out;
animation-fill-mode: forwards;
}
.curtain .animation-bg {
left: 50%;
animation-name: PageAnime-curtain01;
}
.curtain .animation-bg02 {
right: 50%;
animation-name: PageAnime-curtain02;
}
/* カーテン左 キーフレーム */
@keyframes PageAnime-curtain01 {
0% {
transform-origin: left;
transform: scaleX(1);
}
50% {
transform-origin: right;
}
100% {
transform-origin: right;
transform: scaleX(0);
}
}
/* カーテン右 キーフレーム */
@keyframes PageAnime-curtain02 {
0% {
transform-origin: right;
transform: scaleX(1);
}
50% {
transform-origin: left;
}
100% {
transform-origin: left;
transform: scaleX(0);
}
}
