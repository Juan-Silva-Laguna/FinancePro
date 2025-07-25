<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <title>BOLA COLOR</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        .bubble {
            border-radius: 50%;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.12);
            border-width: 4px;
        }
        .bubble-1 {
            height: 15px;
            width: 15px;
            top: 21px;
            left: 59px;
        }
        .bubble-2 {
            height: 27px;
            width: 27px;
            top: 36px;
            left: 16px;
        }
        .bubble-3 {
            height: 21px;
            width: 21px;
            top: 63px;
            left: 49px;
        }
        .bubble-4 {
            height: 15px;
            width: 15px;
            top: 98px;
            left: 37px;
        }
        .bubble-5 {
            height: 5px;
            width: 5px;
            top: 116px;
            left: 20px;
            background-color: transparent;
            border-style: solid;
        }
        .bubble-6 {
            height: 6px;
            width: 6px;
            top: 128px;
            left: 63px;
        }
        .bubble-7 {
            height: 27px;
            width: 27px;
            top: 150px;
            left: 52px;
        }
        .bubble-8 {
            height: 19px;
            width: 19px;
            top: 154px;
            left: 18px;
        }
        .bubble-9 {
            height: 10px;
            width: 10px;
            top: 189px;
            left: 13px;
        }
        .bubble-10 {
            height: 5px;
            width: 5px;
            top: 199px;
            left: 52px;
            background-color: transparent;
            border-style: solid;
        }
        .bubble-11 {
            height: 21px;
            width: 21px;
            top: 220px;
            left: 29px;
        }
        .bubble-12 {
            height: 21px;
            width: 21px;
            top: 263px;
            left: 48px;
        }
        .bubble-13 {
            height: 5px;
            width: 5px;
            top: 275px;
            left: 16px;
            background-color: transparent;
            border-style: solid;
        }
        .bubble-14 {
            height: 15px;
            width: 15px;
            top: 296px;
            left: 34px;
        }
        .triangle {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.12);
        }
        .triangle-1 {
            border-radius: 50%;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.12);
            border-width: 4px;
            height: 10px;
            width: 10px;
            top: 22px;
            left: 55px;
        }
        .triangle-2 {
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 14px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 15px;
            top: 27px;
        }
        .triangle-2:after {
            content: " ";
            display: block;
            position: absolute;
            border-left: 3px solid transparent;
            border-right: 3px solid transparent;
            border-bottom: 5px solid transparent;
            top: 6px;
            left: -3.5px;
            transition: border-bottom-color 0.4s ease;
        }
        .red .triangle-2:after {
            border-bottom-color: #fc5c82;
        }
        .yellow .triangle-2:after {
            border-bottom-color: #fcd45c;
        }
        .purple .triangle-2:after {
            border-bottom-color: #9174f5;
        }
        .triangle-3 {
            border-left: 12px solid transparent;
            border-right: 12px solid transparent;
            border-bottom: 19px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 43px;
            top: 60px;
        }
        .triangle-3:after {
            content: " ";
            display: block;
            position: absolute;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 9px solid transparent;
            top: 6px;
            left: -4.75px;
            transition: border-bottom-color 0.4s ease;
        }
        .red .triangle-3:after {
            border-bottom-color: #fc5c82;
        }
        .yellow .triangle-3:after {
            border-bottom-color: #fcd45c;
        }
        .purple .triangle-3:after {
            border-bottom-color: #9174f5;
        }
        .triangle-4 {
            border-radius: 50%;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.12);
            border-width: 3px;
            height: 8px;
            width: 8px;
            top: 61px;
            left: 17px;
            background-color: transparent;
            border-style: solid;
        }
        .triangle-5 {
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 8px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 25px;
            top: 101px;
            transform: rotate(180deg);
        }
        .triangle-6 {
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-bottom: 6px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 60px;
            top: 103px;
            transform: rotate(-90deg);
        }
        .triangle-7 {
            border-left: 12.5px solid transparent;
            border-right: 12.5px solid transparent;
            border-bottom: 19px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 17px;
            top: 126px;
            transform: rotate(180deg);
        }
        .triangle-8 {
            border-left: 10.5px solid transparent;
            border-right: 10.5px solid transparent;
            border-bottom: 16px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 50px;
            top: 149px;
        }
        .triangle-9 {
            border-left: 5.5px solid transparent;
            border-right: 5.5px solid transparent;
            border-bottom: 8px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 21px;
            top: 177px;
        }
        .triangle-10 {
            border-radius: 50%;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.12);
            border-width: 4px;
            height: 10px;
            width: 10px;
            top: 177px;
            left: 60px;
        }
        .triangle-11 {
            border-left: 9px solid transparent;
            border-right: 9px solid transparent;
            border-bottom: 13px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 33px;
            top: 213px;
            transform: rotate(180deg);
        }
        .triangle-12 {
            border-radius: 50%;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.12);
            border-width: 2px;
            height: 10px;
            width: 10px;
            top: 233px;
            left: 65px;
            background-color: transparent;
            border-style: solid;
        }
        .triangle-13 {
            border-radius: 50%;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.12);
            border-width: 4px;
            height: 10px;
            width: 10px;
            top: 250px;
            left: 22px;
        }
        .triangle-14 {
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 14px solid rgba(0, 0, 0, 0.12);
            background-color: transparent;
            left: 45px;
            top: 270px;
            transform: rotate(180deg);
        }
        .triangle-14:after {
            content: " ";
            display: block;
            position: absolute;
            border-left: 3px solid transparent;
            border-right: 3px solid transparent;
            border-bottom: 5px solid transparent;
            top: 6px;
            left: -3.5px;
            transition: border-bottom-color 0.4s ease;
        }
        .red .triangle-14:after {
            border-bottom-color: #fc5c82;
        }
        .yellow .triangle-14:after {
            border-bottom-color: #fcd45c;
        }
        .purple .triangle-14:after {
            border-bottom-color: #9174f5;
        }
        .stick .block {
            position: absolute;
            overflow: hidden;
            z-index: 999;
            border-radius: 7px;
        }
        .stick .block .inner {
            border-radius: 7px;
            background-color: rgba(0, 0, 0, 0.12);
            border-color: rgba(0, 0, 0, 0.12);
            border-width: 3px;
            height: 100%;
            width: 100%;
            position: absolute;
        }
        .stick .block:nth-child(2n+1) .inner-2 {
            left: -200%;
        }
        .stick .block:nth-child(2n+2) .inner-2 {
            left: 200%;
        }
        .stick .block-1 {
            height: 16px;
            width: 31px;
            top: 16px;
            left: 30px;
        }
        .stick .block-1 .inner {
            background-color: transparent !important;
            border-style: solid;
            box-sizing: border-box;
        }
        .stick .block-2 {
            height: 14px;
            width: 42px;
            top: 50px;
            left: 15px;
        }
        .stick .block-3 {
            height: 18px;
            width: 9px;
            top: 73px;
            left: 64px;
        }
        .stick .block-4 {
            height: 9px;
            width: 14px;
            top: 84px;
            left: 26px;
        }
        .stick .block-5 {
            height: 15px;
            width: 15px;
            top: 109px;
            left: 45px;
        }
        .stick .block-5 .inner {
            border-radius: 50%;
        }
        .stick .block-6 {
            height: 9px;
            width: 27px;
            top: 135px;
            left: 19px;
        }
        .stick .block-7 {
            height: 12px;
            width: 12px;
            top: 144px;
            left: 60px;
        }
        .stick .block-7 .inner {
            border-radius: 50%;
            border-style: solid;
            box-sizing: border-box;
            background-color: transparent;
        }
        .stick .block-8 {
            height: 27px;
            width: 14px;
            top: 164px;
            left: 24px;
        }
        .stick .block-9 {
            height: 8px;
            width: 8px;
            top: 188px;
            left: 64px;
        }
        .stick .block-10 {
            height: 12px;
            width: 22px;
            top: 219px;
            left: 11px;
        }
        .stick .block-10 .inner {
            background-color: transparent !important;
            border-style: solid;
            box-sizing: border-box;
        }
        .stick .block-11 {
            height: 22px;
            width: 22px;
            top: 226px;
            left: 50px;
        }
        .stick .block-11 .inner {
            border-radius: 50%;
        }
        .stick .block-12 {
            height: 18px;
            width: 9px;
            top: 248px;
            left: 26px;
        }
        .stick .block-13 {
            height: 8px;
            width: 8px;
            top: 278px;
            left: 50px;
        }
        .stick .block-13 .inner {
            border-radius: 50%;
        }
        .stick .block-14 {
            height: 12px;
            width: 22px;
            top: 297px;
            left: 18px;
        }
        .stick .block-14 .inner {
            background-color: transparent !important;
            border-style: solid;
            box-sizing: border-box;
        }
        .stick .block-15 {
            height: 9px;
            width: 27px;
            top: 307px;
            left: 48px;
        }
        body {
            background-color: #28dad4;
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Roboto', sans-serif;
        }
        a {
            cursor: url(https://greghub.github.io/coloron/public/svg/cursor.svg), pointer;
        }
        a:focus, a:active {
            cursor: url(https://greghub.github.io/coloron/public/svg/cursor-tap.svg), pointer;
        }
        .container {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
        }
        .waves, .mounts {
            position: absolute;
            width: 100%;
            left: 0;
            bottom: 0;
        }
        .waves div, .mounts div {
            position: absolute;
            width: 100%;
        }
        .clouds {
            position: absolute;
            width: 100%;
            left: 0;
            top: 77px;
            height: 151px;
            background: url(https://greghub.github.io/coloron/public/svg/clouds.svg) repeat-x;
            background-position-x: 170px;
        }
        .top_wave {
            background: url(https://greghub.github.io/coloron/public/svg/top_wave.png) repeat-x 0 -1px;
            height: 35px;
            bottom: 0;
            z-index: 10001;
        }
        .wave1 {
            background: url(https://greghub.github.io/coloron/public/svg/wave1.svg) repeat-x;
            height: 150px;
            bottom: 0;
            z-index: 23;
        }
        .wave2 {
            background: url(https://greghub.github.io/coloron/public/svg/wave2.svg) repeat-x;
            height: 180px;
            bottom: 30px;
            z-index: 22;
        }
        .wave3 {
            background: url(https://greghub.github.io/coloron/public/svg/wave3.svg) repeat-x;
            height: 180px;
            bottom: 90px;
            z-index: 21;
        }
        .wave4 {
            background: url(https://greghub.github.io/coloron/public/svg/wave4.svg) repeat-x;
            height: 180px;
            bottom: 120px;
            z-index: 20;
        }
        .mount1 {
            background: url(https://greghub.github.io/coloron/public/svg/mount1.svg) repeat-x;
            height: 150px;
            bottom: 280px;
            z-index: 11;
        }
        .mount2 {
            background: url(https://greghub.github.io/coloron/public/svg/mount2.svg) repeat-x;
            height: 150px;
            bottom: 290px;
            z-index: 10;
        }
        .noise {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: 1010;
            background: url(https://greghub.github.io/coloron/public/svg/noise.png);
        }
        .glow {
            position: absolute;
            left: -350px;
            top: -350px;
            width: 800px;
            height: 800px;
            background-color: rgba(81, 237, 200, 0.34);
            border-radius: 50%;
            box-shadow: 0 0 100px 100px rgba(81, 237, 200, 0.34);
            z-index: 1010;
        }
        .sun {
            position: relative;
            left: 50%;
            top: 50%;
            width: 1px;
            height: 1px;
            background-color: rgba(255, 227, 69, 1);
            border-radius: 50%;
            box-shadow: 0 0 32px 32px rgba(255, 227, 69, 1), 0 0 150px 150px rgba(103, 244, 210, 0.4);
        }
        .small-glow {
            z-index: 99;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.34);
            box-shadow: 0 0 1px 1px rgba(255, 255, 255, 0.34);
        }
        .small-glow.yellow {
            background-color: rgba(255, 227, 69, 0.34);
            box-shadow: 0 0 4px 4px rgba(255, 227, 69, 0.34);
        }
        .sticks {
            z-index: 1011;
            outline: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        .stick {
            height: 362px;
            width: 90px;
            border-radius: 14px;
            background-image: url(https://greghub.github.io/coloron/public/svg/noise.png);
            position: relative;
            overflow: hidden;
            float: left;
            margin-right: 90px;
            transition: background-color 0.4s ease;
            cursor: url(https://greghub.github.io/coloron/public/svg/cursor.svg), pointer;
        }
        .stick:focus, .stick:active {
            cursor: url(https://greghub.github.io/coloron/public/svg/cursor-tap.svg), pointer;
        }
        .stick.red {
            background-color: #ff4571;
        }
        .stick.yellow {
            background-color: #ffd145;
        }
        .stick.purple {
            background-color: #8260f6;
        }
        .stick.inactive {
            background-color: #4c4660;
        }
        .ball, .ball-demo {
            background: url(https://greghub.github.io/coloron/public/svg/ball.svg) right bottom;
            background-size: 64px 64px;
            width: 53px;
            height: 53px;
            z-index: 1011;
            background-color: #ff4571;
            border-radius: 50%;
        }
        .ball {
            margin-bottom: 250px;
        }
        .controls {
            z-index: 999999;
            position: relative;
        }
        .game-full-flex {
            position: fixed;
            display: none;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 9998;
        }
        .start-game .start-game-top {
            min-height: 20%;
        }
        .start-game .start-game-top .play-full-page {
            display: none;
            border: 3px solid #fff;
            border-radius: 100px;
            color: #fff;
            width: 260px;
            height: 50px;
            font-size: 28px;
            text-align: center;
            font-weight: 900;
            letter-spacing: -1px;
            line-height: 52px;
            text-decoration: none;
            text-transform: uppercase;
            margin-top: 24px;
        }
        .start-game .start-game-top .play-full-page:hover {
            opacity: 0.7;
        }
        .start-game .logo-holder {
            width: 585px;
            height: 162px;
            background-color: #4c4660;
            border: 4px solid #ff4571;
            border-radius: 68px;
            text-align: center;
            margin-top: -10%;
        }
        .start-game .logo-holder .logo {
            color: #fff;
            text-transform: uppercase;
            font-weight: 900;
            font-size: 100px;
            letter-spacing: -0.1em;
            margin-top: 10px;
            margin-bottom: 4px;
            text-align: center;
        }
        .start-game .logo-holder .logo span {
            margin-left: -8px;
            margin-right: -8px;
        }
        .start-game .logo-holder .play-button {
            display: inline-block;
            background-color: #ff4571;
            border: 4px solid #fff;
            border-radius: 100px;
            color: #fff;
            width: 200px;
            height: 56px;
            font-size: 42px;
            text-align: center;
            font-weight: 900;
            letter-spacing: -3px;
            line-height: 56px;
            text-decoration: none;
        }
        .start-game .logo-holder .play-button:hover {
            background-color: #ff5f84;
        }
        .start-game .logo-holder .hint {
            color: #fff;
            font-size: 20px;
        }
        .start-game .logo-holder .hint span {
            color: #ff4571;
        }
        .start-game .how-to-play {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }
        .start-game .how-to-play .section-1, .start-game .how-to-play .section-3 {
            flex: 1;
        }
        .start-game .how-to-play .section-1 .content, .start-game .how-to-play .section-3 .content {
            justify-content: center;
        }
        .start-game .how-to-play h4 {
            color: #fff;
            font-weight: 400;
            font-size: 22px;
            text-align: center;
        }
        .start-game .how-to-play .content {
            height: 200px;
            position: relative;
            display: flex;
            justify-content: space-around;
        }
        .start-game .how-to-play .bar {
            width: 60px;
            border-radius: 7px;
            margin-top: auto;
            transition: background-color 0.4s ease;
        }
        .start-game .how-to-play .bar.bar-1 {
            height: 180px;
            background: #ff4571;
        }
        .start-game .how-to-play .bar.bar-2 {
            height: 120px;
            background: #ffd145;
        }
        .start-game .how-to-play .bar.bar-3 {
            height: 150px;
            background: #4c4660;
        }
        .start-game .how-to-play .section-2 .bar {
            cursor: url(https://greghub.github.io/coloron/public/svg/cursor.svg), pointer;
        }
        .start-game .how-to-play .section-2 .bar:focus, .start-game .how-to-play .section-2 .bar:active {
            cursor: url(https://greghub.github.io/coloron/public/svg/cursor-tap.svg), pointer;
        }
        .start-game .how-to-play .section-3 .ball-demo {
            background-color: #815ff8;
        }
        .start-game .how-to-play .section-3 .bar-1 {
            height: 120px;
            background-color: #815ff8;
        }
        .stop-game {
            justify-content: center;
        }
        .stop-game .score-container {
            background-color: #4c4660;
            width: 433px;
            height: 386px;
            border-radius: 38px;
            text-align: center;
        }
        .stop-game .score-container h1 {
            color: #fff;
            text-transform: uppercase;
            letter-spacing: -0.1em;
            margin-top: 20px;
            margin-bottom: 4px;
            font-size: 64px;
        }
        .stop-game .score-container .final-score {
            color: #ffe345;
            font-weight: 900;
            font-size: 130px;
            letter-spacing: -6px;
            line-height: 110px;
        }
        .stop-game .score-container .result {
            color: #ff4571;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 30px;
        }
        .stop-game .score-container h4 {
            color: #fff;
            margin-top: 12px;
        }
        .stop-game .score-container .tweet {
            background: #fff;
            padding: 8px 20px;
            border-radius: 4px;
            color: #55acee;
            text-decoration: none;
            font-size: 18px;
            line-height: 24px;
            display: inline-block;
        }
        .stop-game .score-container .tweet:hover {
            background-color: #55acee;
            color: #fff;
        }
        .stop-game .score-container .tweet i {
            font-size: 24px;
            top: 2px;
            right: 2px;
            position: relative;
        }
        .stop-game .score-container .play-again {
            background-color: #ff4571;
            border: 2px solid #fff;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 900;
            letter-spacing: -1px;
            font-size: 26px;
            padding: 6px 24px;
            border-radius: 22px;
            margin: 6px 4px;
            display: inline-block;
        }
        .stop-game .score-container .play-again:hover {
            background-color: #ff5f84;
        }
        .stop-game .score-container .main-menu {
            background-color: #44bfa3;
            border: 2px solid #fff;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 900;
            letter-spacing: -1px;
            font-size: 26px;
            padding: 6px 24px;
            border-radius: 22px;
            margin: 6px 4px;
            display: inline-block;
        }
        .stop-game .score-container .main-menu:hover {
            background-color: #57c6ac;
        }
        .scene {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            z-index: 9997;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }
        .scene .ball-holder {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding-left: 558px;
        }
        .scene .score {
            position: fixed;
            right: 54px;
            top: 20px;
            color: #33485f;
            font-size: 90px;
            font-weight: 900;
            letter-spacing: -0.1em;
        }
        .scene .learn-to-play {
            z-index: 9999;
            display: inline-block;
            text-align: center;
            position: relative;
            top: 20%;
            font-size: 48px;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 700;
            letter-spacing: -2px;
            opacity: 0;
        }
        .splash {
            display: none;
        }
        @media print {
            .splash {
                display: block;
                position: fixed;
                z-index: 99999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: #28dad4;
                background-image: url(https://greghub.github.io/coloron/public/images/coloron-image.png);
                background-size: auto 100%;
                background-repeat: no-repeat;
                background-position: center;
            }
        }
        .nominee {
            position: fixed;
            right: 0;
            top: 0;
            z-index: 9999;
        }

    </style>
</head>
<body>
    <div class="splash"></div>
    <div class="container">

            <div class="start-game game-full-flex" id="start-game">

                <div class="start-game-top"><a class="play-full-page" href="https://codepen.io/gregh/full/yVLOyO/"  target="_blank">Full Page Mode</a></div>

                <div class="logo-holder">
                    <p class="logo">
                        <span>B</span>
                        <span>O</span>
                        <span>L</span>
                        <span>A</span>
                        <span>-</span>
                        <span>C</span>
                        <span>O</span>
                        <span>L</span>
                        <span>O</span>
                        <span>R</span>
                    </p>
                    <a class="play-button" href="#" onclick="game.start()">Iniciar</a>
                    <h4 class="hint">Consejo: El color<span>Rojo</span> siempre es primero</h4>
                </div>

                <div class="how-to-play">
                    <div class="section section-1">
                        <h4>Pelota que rebota<br>cambia de color</h4>
                        <div class="content">
                            <div class="ball-demo" id="ball-demo"></div>
                        </div>
                    </div>
                    <div class="section section-2">
                        <h4>Toque la barra para cambiar los colores<br>(Rojo, Amarillo, Púrpura)</h4>
                        <div class="content">
                            <div class="bar bar-1" data-index="0"></div>
                            <div class="bar bar-2"></div>
                            <div class="bar bar-3"></div>
                        </div>
                    </div>
                    <div class="section section-3">
                        <h4>Siempre haga coincidir los colores de la bola y la barra.</h4>
                        <div class="content">
                            <div class="ball-demo" id="ball-demo"></div>
                            <div class="bar bar-1"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="stop-game game-full-flex">

                <div class="score-container">

                    <h1>Bola Color</h1>

                    <div class="final-score"></div>
                    <div class="result"></div>

                    <div>
                        <a class="play-again" href="#" onclick="game.start()">Jugar de nuevo</a>
                        <a class="main-menu" href="#" onclick="game.intro()">Menu</a>
                    </div>

                </div>

            </div>

            <div class="small-glows"></div>

            <div class="glow"><div class="sun"></div></div>

            <div class="waves">
                <div class="top_wave"></div>
                <div class="wave1"></div>
                <div class="wave2"></div>
                <div class="wave3"></div>
                <div class="wave4"></div>
            </div>

            <div class="mounts">
                <div class="mount1"></div>
                <div class="mount2"></div>
            </div>

            <div class="clouds"></div>

            <div class="scene">
                <div class="learn-to-play">Haga clic en las barras para cambiar el color.!</div>
                <div class="score" id="score"></div>
                <div class="ball-holder"></div>
                <div class="sticks" id="sticks"></div>
            </div>

            <div class="noise"></div>

        </div>

</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
<script>
    class Game {
        constructor() {
            this.score = 0;
            this.isRunning = 0; // game is not running

            this.calculateScale();

            this.timeline = new TimelineMax({ smoothChildTiming: true });
            this.time = 1.6; // initial speed
            this.colors = ["#FF4571", "#FFD145", "#8260F6"]; // the 3 colors used in the game
            this.colorsRGBA = [
            "rgba(255, 69, 113, 1)",
            "rgba(255, 69, 113, 1)",
            "rgba(255, 69, 113, 1)",
            ];
            this.color = this.colors[0]; // the intial color of the ball
            this.prevColor = null; // used as a holder to prevent ball colors from repeating
        }

        /**
         * The game screen is scalable. I took 1200x800px as the initial scale.
         * In order to display the game an many screen sizes properly
         * I have to compare the player's sreen size to the initial scale,
         * then scale the game using CSS Transform to fit the screen properly
         * The function is called in the controller and anywhere where I need
         * to recalculate the scale on screen resize or device rotation
         */
        calculateScale() {
            this.screen = $(window).width(); // screen width
            this.screenHeight = $(window).height();
            this.scale =
            this.screen > this.screenHeight
                ? this.screenHeight / 800
                : this.screen / 1200;
            this.stickWidth = 180 * this.scale;
            this.steps = this.screen / this.stickWidth; // how many steps (stick width + margin) it takes from one end to another
        }

        /**
         * Creating as many sticks we need to fill the screen
         * from start to end of the screen. The steps property is used for that
         */
        generateSticks() {
            let numberOfSticks = Math.ceil(this.steps);
            for (let i = 0; i <= numberOfSticks; i++) new Stick();
        }

        generateBall() {
            this.balltween = new TimelineMax({ repeat: -1, paused: 1 });
            $(".scene .ball-holder").append('<div class="ball red" id="ball"></div>');
            this.bounce();
        }

        generateTweet() {
            let top = $(window).height() / 2 - 150;
            let left = $(window).width() / 2 - 300;
            window.open(
            "https://twitter.com/intent/tweet?url=https://codepen.io/gregh/full/yVLOyO&amp;text=I scored " +
                this.score +
                " points on Coloron! Can you beat my score?&amp;via=greghvns&amp;hashtags=coloron",
            "TweetWindow",
            "width=600px,height=300px,top=" + top + ",left=" + left
            );
        }

        /**
         * The greeting when the game begins
         */
        intro() {
            TweenMax.killAll();

            //TweenMax.to('.splash', 0.3, { opacity: 0, display: 'none', delay: 1 })

            $(".stop-game").css("display", "none");
            $(".start-game").css("display", "flex");

            let introTl = new TimelineMax();
            let ball = new TimelineMax({ repeat: -1, delay: 3 });
            introTl
            .fromTo(".start-game .logo-holder", 0.9, { opacity: 0 }, { opacity: 1 })
            .staggerFromTo(
                ".start-game .logo span",
                0.5,
                { opacity: 0 },
                { opacity: 1 },
                0.08
            )
            .staggerFromTo(
                ".start-game .bar",
                1.6,
                { y: "+100%" },
                { y: "0%", ease: Elastic.easeOut.config(1, 0.3) },
                0.08
            )
            .staggerFromTo(
                ".start-game .ball-demo",
                1,
                { scale: 0 },
                { scale: 1, ease: Elastic.easeOut.config(1, 0.3) },
                0.8,
                2
            );

            ball
            .fromTo(
                ".start-game .section-1 .ball-demo",
                0.5,
                { y: "0px" },
                {
                y: "100px",
                scaleY: 1.1,
                transformOrigin: "bottom",
                ease: Power2.easeIn,
                }
            )
            .to(".start-game .section-1 .ball-demo", 0.5, {
                y: "0px",
                scaleY: 1,
                transformOrigin: "bottom",
                ease: Power2.easeOut,
                onStart: () => {
                while (this.prevColor == this.color) {
                    this.color = new Color().getRandomColor();
                }
                this.prevColor = this.color;
                TweenMax.to(".start-game .section-1 .ball-demo", 0.5, {
                    backgroundColor: this.color,
                });
                },
            });
        }

        /**
         * Display score
         */
        showResult() {
            let score = this.score;
            $(".stop-game").css("display", "flex");
            $(".stop-game .final-score").text(score + "!");
            $(".stop-game .result").text(this.showGrade(score));
            $(".nominee").show();
            if (score>0) {
                alert("Has conseguido "+score+" puntos");
            }

            let resultTimeline = new TimelineMax();
            resultTimeline
            .fromTo(
                ".stop-game .score-container",
                0.7,
                { opacity: 0, scale: 0.3 },
                { opacity: 1, scale: 1, ease: Elastic.easeOut.config(1.25, 0.5) }
            )
            .fromTo(
                ".stop-game .final-score",
                2,
                { scale: 0.5 },
                { scale: 1, ease: Elastic.easeOut.config(2, 0.5) },
                0
            )
            .fromTo(
                ".stop-game .result",
                1,
                { scale: 0.5 },
                { scale: 1, ease: Elastic.easeOut.config(1.5, 0.5) },
                0.3
            );
        }

        /**
         * Takes players score and generates the cheering copy
         * @param  {int} score
         * @return {string} grade
         */
        showGrade(score) {
            if (score > 30) return "Chuck Norris?";
            else if (score > 25) return "You're da man";
            else if (score > 20) return "Awesome";
            else if (score > 15) return "Great!";
            else if (score > 13) return "Nice!";
            else if (score > 10) return "Good Job!";
            else if (score > 5) return "Really?";
            else return "Puntos";
        }

        start() {
            this.score = 0; // reset

            this.stop(); // stop the game

            $(".start-game, .stop-game").css("display", "none"); // hide all the popups
            $(".nominee").hide();

            new Game();

            this.isRunning = 1;

            // Clean up the stick and ball holders
            // and generate new ones
            $("#sticks, .scene .ball-holder").html("");
            $("#score").text(this.score);
            this.generateSticks();
            this.generateBall();

            // disables scene animations for Phones
            if (
            !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                window.navigator.userAgent
            )
            ) {
            Animation.sceneAnimation();
            }
            this.moveToStart();
            this.moveScene();

            // reset timescale to normal as the game speeds up
            this.timeline.timeScale(1);
            this.balltween.timeScale(1);
        }

        stop() {
            this.isRunning = 0;

            $(".start-game, .stop-game").css("display", "none");
            $("#sticks, .scene .ball-holder, #score").html("");
            TweenMax.killAll();

            this.showResult();
        }

        scaleScreen() {
            TweenMax.killAll(); // prevent multiple calls on resize

            let height = $(window).height();
            let width = $(window).width();

            this.calculateScale();

            $(".container")
            .css("transform", "scale(" + this.scale + ")")
            .css("height", height / this.scale)
            .css("width", width / this.scale)
            .css("transformOrigin", "left top");

            $("#sticks").width(
            this.screen / this.scale + (3 * this.stickWidth) / this.scale
            );
        }

        /**
         * Calls the above function
         * If the game is running it stops and shows the score
         * If the game has stops it takes player to the main menu
         */
        scaleScreenAndRun() {
            this.scaleScreen();

            if (this.isRunning) {
            this.stop();
            } else {
            this.intro();
            }
        }

        /**
         * This is the initial animation
         * where the sticks come to the starting position
         * and the ball appears and falls down
         */
        moveToStart() {
            let tip = new TimelineMax({ delay: 2 });

            tip
            .fromTo(
                ".learn-to-play",
                1,
                { scale: 0 },
                { scale: 1, opacity: 1, ease: Elastic.easeOut.config(1.25, 0.5) }
            )
            .to(
                ".learn-to-play",
                1,
                { scale: 0, opacity: 0, ease: Elastic.easeOut.config(1.25, 0.5) },
                3
            );

            TweenMax.fromTo(
            "#ball",
            this.time,
            {
                scale: 0,
            },
            {
                scale: 1,
                delay: this.time * (this.steps - 3 - 1.5),
                onComplete: () => {
                this.balltween.play();
                },
            }
            );

            this.timeline.add(
            TweenMax.fromTo(
                "#sticks",
                this.time * this.steps,
                { x: this.screen / this.scale },
                { x: 0, ease: Power0.easeNone }
            )
            );
        }

        /**
         * The animation that moves sticks
         */
        moveScene() {
            this.timeline.add(
            TweenMax.to("#sticks", this.time, {
                x: "-=180px",
                ease: Power0.easeNone,
                repeat: -1,
                onRepeat: () => {
                this.rearrange();
                },
            })
            );
        }

        /**
         * removes the first stick and adds one the the end
         * this gives the sticks an infinite movement
         */
        rearrange() {
            let scale = this.speedUp();

            this.timeline.timeScale(scale);
            this.balltween.timeScale(scale);

            $("#sticks .stick").first().remove();
            new Stick();
        }

        /**
         * The game speeds up based on score
         * The GSAP timeScale() function is called on the timeline to speed up the game
         * This calculates how much shall the game speed up
         */
        speedUp() {
            if (this.score > 30) {
            return 1.8;
            }
            if (this.score > 20) {
            return 1.7;
            }
            if (this.score > 15) {
            return 1.5;
            } else if (this.score > 12) {
            return 1.4;
            } else if (this.score > 10) {
            return 1.3;
            } else if (this.score > 8) {
            return 1.2;
            } else if (this.score > 5) {
            return 1.1;
            }
            return 1;
        }

        /**
         * Ball bouncing animation
         * It checks if the ball and stick colors match
         * And changes the ball color
         */
        bounce() {
            this.balltween
            .to("#ball", this.time / 2, {
                y: "+=250px",
                scaleY: 0.7,
                transformOrigin: "bottom",
                ease: Power2.easeIn,
                onComplete: () => {
                this.checkColor();
                },
            })
            .to("#ball", this.time / 2, {
                y: "-=250px",
                scaleY: 1.1,
                transformOrigin: "bottom",
                ease: Power2.easeOut,
                onStart: () => {
                while (this.prevColor == this.color) {
                    this.color = new Color().getRandomColor();
                }
                this.prevColor = this.color;
                TweenMax.to("#ball", 0.5, { backgroundColor: this.color });
                $("#ball")
                    .removeClass("red")
                    .removeClass("yellow")
                    .removeClass("purple")
                    .addClass(new Color().colorcodeToName(this.color));
                },
            });
        }

        checkColor() {
            let ballPos = $("#ball").offset().left + $("#ball").width() / 2;
            let stickWidth = $(".stick").width();
            let score = this.score;

            $("#sticks .stick").each(function () {
            if (
                $(this).offset().left < ballPos &&
                $(this).offset().left > ballPos - stickWidth
            ) {
                if (
                Color.getColorFromClass($(this)) == Color.getColorFromClass("#ball")
                ) {
                // if matches increase the score
                score++;
                $("#score").text(score);
                TweenMax.fromTo(
                    "#score",
                    0.5,
                    { scale: 1.5 },
                    { scale: 1, ease: Elastic.easeOut.config(1.5, 0.5) }
                );
                } else {
                // you loose
                game.stop();
                }
            }
            });

            this.score = score;
        }
        }

        class Stick {
        constructor() {
            this.stick = this.addStick();
        }

        addStick() {
            this.stick = $("#sticks").append('<div class="stick inactive"></div>');
            return this.stick;
        }
        }

        class Color {
        constructor() {
            this.colors = ["#FF4571", "#FFD145", "#8260F6"];
            this.effects = ["bubble", "triangle", "block"];
            this.prevEffect = null;
        }

        getRandomColor() {
            let colorIndex = Math.random() * 3;
            let color = this.colors[Math.floor(colorIndex)];
            return color;
        }

        colorcodeToName(color) {
            let colors = ["#FF4571", "#FFD145", "#8260F6"];
            let names = ["red", "yellow", "purple"];
            let index = colors.indexOf(color);
            if (index == -1) return false;
            return names[index];
        }

        /**
         * Changes the color of an element
         * As we as adds verbal name of the color
         */
        changeColor(el) {
            let index = el.data("index");
            if (index === undefined) {
            index = 0;
            } else {
            index += 1;
            }
            if (index == 3) index = 0;
            el.css("background-color", this.colors[index]).data("index", index);

            el.removeClass("red")
            .removeClass("yellow")
            .removeClass("purple")
            .addClass(this.colorcodeToName(this.colors[index]));

            if (el.hasClass("inactive")) {
            this.setEffect(el);
            el.addClass("no-effect");
            }

            el.removeClass("inactive");
        }

        getRandomEffect() {
            let effectIndex = null;

            effectIndex = Math.floor(Math.random() * 3);
            while (effectIndex == this.prevEffect) {
            effectIndex = Math.floor(Math.random() * 3);
            }

            this.prevEffect = effectIndex;
            return this.effects[effectIndex];
        }

        /**
         * Adds the effect specific particles to the stick
         */
        setEffect(el) {
            let effect = this.getRandomEffect();
            el.addClass(effect + "-stick");
            for (let i = 1; i <= 14; i++) {
            if (effect == "block") {
                el.append(
                `<div class="${effect} ${effect}-${i}"><div class="inner"></div><div class="inner inner-2"></div></div>`
                );
            } else {
                el.append(`<div class="${effect} ${effect}-${i}"></div>`);
            }
            }
        }

        /**
         * Since the ball and sticks have several classes
         * This method searches for the color class
         * @param el [DOM element]
         * @return {string} class name
         */
        static getColorFromClass(el) {
            let classes = $(el).attr("class").split(/\s+/);
            for (var i = 0, len = classes.length; i < len; i++) {
            if (
                classes[i] == "red" ||
                classes[i] == "yellow" ||
                classes[i] == "purple"
            ) {
                return classes[i];
            }
            }
        }
        }

        class Animation {
        /**
         * Creates and positions the small glow elements on the screen
         */
        static generateSmallGlows(number) {
            let h = $(window).height();
            let w = $(window).width();
            let scale = w > h ? h / 800 : w / 1200;

            h = h / scale;
            w = w / scale;

            for (let i = 0; i < number; i++) {
            let left = Math.floor(Math.random() * w);
            let top = Math.floor(Math.random() * (h / 2));
            let size = Math.floor(Math.random() * 8) + 4;
            $(".small-glows").prepend('<div class="small-glow"></div>');
            let noise = $(".small-glows .small-glow").first();
            noise.css({ left: left, top: top, height: size, width: size });
            }
        }

        /**
         * Creates the animations for sticks
         * The effects is chosen by random
         * And one of the three functions is
         * Called accordingly
         */
        playBubble(el) {
            let bubble = new TimelineMax();
            bubble.staggerFromTo(
            el.find(".bubble"),
            0.3,
            { scale: 0.1 },
            { scale: 1 },
            0.03
            );
            bubble.staggerTo(
            el.find(".bubble"),
            0.5,
            { y: "-=60px", yoyo: true, repeat: -1 },
            0.03
            );
        }

        playTriangle(el) {
            let triangle = new TimelineMax();
            triangle
            .staggerFromTo(
                el.find(".triangle"),
                0.3,
                { scale: 0.1 },
                { scale: 1 },
                0.03
            )
            .staggerTo(
                el.find(".triangle"),
                1.5,
                {
                cycle: {
                    rotationY: [0, 360],
                    rotationX: [360, 0],
                },
                repeat: -1,
                repeatDelay: 0.1,
                },
                0.1
            );
        }

        playBlock(el) {
            let block = new TimelineMax();
            let block2 = new TimelineMax({ delay: 0.69 });

            block
            .staggerFromTo(el.find(".block"), 0.3, { scale: 0.1 }, { scale: 1 }, 0.03)
            .staggerTo(
                el.find(".block .inner:not(.inner-2)"),
                1,
                {
                cycle: {
                    x: ["+200%", "-200%"],
                },
                repeat: -1,
                repeatDelay: 0.6,
                },
                0.1
            );
            block2.staggerTo(
            el.find(".block .inner-2"),
            1,
            {
                cycle: {
                x: ["+200%", "-200%"],
                },
                repeat: -1,
                repeatDelay: 0.6,
            },
            0.1
            );
        }

        static sceneAnimation() {
            const speed = 15; // uses it's local speed

            // animates the small glows in a circular motion
            $(".small-glow").each(function () {
            let speedDelta = Math.floor(Math.random() * 8);
            let radius = Math.floor(Math.random() * 20) + 20;
            TweenMax.to($(this), speed + speedDelta, {
                rotation: 360,
                transformOrigin: "-" + radius + "px -" + radius + "px",
                repeat: -1,
                ease: Power0.easeNone,
            });
            });

            var wavet = TweenMax.to(".top_wave", (speed * 1.7) / 42, {
            backgroundPositionX: "-=54px",
            repeat: -1,
            ease: Power0.easeNone,
            });
            var wave1 = TweenMax.to(".wave1", (speed * 1.9) / 42, {
            backgroundPositionX: "-=54px",
            repeat: -1,
            ease: Power0.easeNone,
            });
            var wave2 = TweenMax.to(".wave2", (speed * 2) / 42, {
            backgroundPositionX: "-=54px",
            repeat: -1,
            ease: Power0.easeNone,
            });
            var wave3 = TweenMax.to(".wave3", (speed * 2.2) / 42, {
            backgroundPositionX: "-=54px",
            repeat: -1,
            ease: Power0.easeNone,
            });
            var wave4 = TweenMax.to(".wave4", (speed * 2.4) / 42, {
            backgroundPositionX: "-=54px",
            repeat: -1,
            ease: Power0.easeNone,
            });

            var mount1 = TweenMax.to(".mount1", speed * 8, {
            backgroundPositionX: "-=1760px",
            repeat: -1,
            ease: Power0.easeNone,
            });
            var mount2 = TweenMax.to(".mount2", speed * 10, {
            backgroundPositionX: "-=1782px",
            repeat: -1,
            ease: Power0.easeNone,
            });

            var clouds = TweenMax.to(".clouds", speed * 3, {
            backgroundPositionX: "-=1001px",
            repeat: -1,
            ease: Power0.easeNone,
            });
        }
        }

        var game = new Game();
        var animation = new Animation();
        var color = new Color();
        var userAgent = window.navigator.userAgent;

        Animation.generateSmallGlows(20);

        $(document).ready(function () {
        //game.showResult();
        game.scaleScreen();
        game.intro();
        //game.start();
        //game.bounce();

        if ($(window).height() < 480) {
            $(".play-full-page").css("display", "block");
        }
        });

        $(document).on("click", ".stick", function () {
        color.changeColor($(this));
        if ($(this).hasClass("no-effect")) {
            if ($(this).hasClass("bubble-stick")) {
            animation.playBubble($(this));
            } else if ($(this).hasClass("triangle-stick")) {
            animation.playTriangle($(this));
            } else if ($(this).hasClass("block-stick")) {
            animation.playBlock($(this));
            }
            $(this).removeClass("no-effect");
        }
        });

        $(document).on("click", ".section-2 .bar", function () {
        color.changeColor($(this));
        });

        $(window).resize(function () {
        if (!userAgent.match(/iPad/i) && !userAgent.match(/iPhone/i)) {
            game.scaleScreenAndRun();
        }
        });

        $(window).on("orientationchange", function () {
        game.scaleScreenAndRun();
        });

</script>
</html>

