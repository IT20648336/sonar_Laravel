<!DOCTYPE html>
<html>
<head>
    <title>VIEWPOINT</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            filter: brightness(60%);
        }
        .video-container video {
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
        }
        .content{
          position:absolute;
          top:60%;
          left:30%;
          font-size: 60px;
          color: #E6FF12;
        }
        .GetBtn{
          display: flex;
          flex-direction: row;
          justify-content: center;
          align-items: center;
          padding: 12px 24px;
          gap: 10px;
          position: absolute;
          left: 80.5%;
          right: 8.06%;
          top: 82.2%;
          bottom: 12.5%;
          background: black;
          border-radius: 8px;
        }
        button {
          margin: 0;
          padding: 0;
          border: none;
          outline: none;
          background: none;
          color:white;
        }

    </style>
</head>
<body>
    <div class="video-container">
        <video autoplay muted loop>
            <source src="{{ asset('videos/viewpoint.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="content">
        <p> WELCOME TO VIEWPOINT </p>
    </div>

    <div class="GetBtn">
      <a href="/register"><button name="start">GET START</button></a>
    </div>
</body>
</html>
