<head>
    <style>
        .circular-frame {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            display: inline-block;
        }
        .circular-frame img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="circular-frame">
        {{ $slot }}
    </div>
</body>
</html>