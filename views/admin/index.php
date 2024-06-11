<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../static/pkg/popper/popper.min.js">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <link rel="stylesheet" href="../../static/pkg/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <script src="../../static/pkg/jquery-3.7.1/jquery-3.7.1.min.js"></script>
    <script src="../../static/pkg/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <style>
        .nav {
            box-shadow: 2px 2px 12px 2px #ccc;
            margin: 10px;
        }
    </style>
    <script>
        fetch('../../apis/getUserList.php',{
            method:'GET',
            mode:'cors',
            credentials:'include'
        }).then(response=>{
            return response.json()
        }).then(data=>{
            let userList = document.querySelector("#userList");
            let userHtml = ``;
            data.forEach(v => {
                userHtml += `<tr>
                    <th scope="row">${v[0]}</th>
                    <td>${v[1]}</td>
                    <td>${v[2]}</td>
                </tr>`;
            });
            userList.innerHTML = userHtml;
        });
    </script>
</head>

<body>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active disabled" href="#"><?php 
                session_start();
                if(isset($_SESSION['username'])){
                    echo "当前操作员：".$_SESSION['username'];
                }
                ?>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../../controllers/logout.php">退出</a>
        </li>
    </ul>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">用户ID</th>
                    <th scope="col">用户名</th>
                    <th scope="col">工号</th>
                </tr>
            </thead>
            <tbody id="userList">
            </tbody>
        </table>

    </div> 
</body>

</html>