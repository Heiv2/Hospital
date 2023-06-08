
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Footer</title>
    <style>
        /* CSS kodu */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            
        }

        footer {
            width: 100%;
            text-align: center;
            padding: 10px 0;
            
        }
    </style>
</head>
<body>
    <footer id="myFooter">Copyright &copy; <span id="year"></span> City Hospital</footer>

    <script>
    document.getElementById("year").textContent = new Date().getFullYear();
    </script>
</body>
</html>