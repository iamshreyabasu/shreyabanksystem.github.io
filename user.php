<!DOCTYPE html>
<html>
    <head>
        <title>Customers</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">

        <style>
            
            table {
                border-collapse: collapse;
                width: 100%;
                color:black;
                font-size: 25px;
                text-align: left;
            }

            th {
                background-color: #6c5613;
                color: white;
            }

            tr:nth-child(even) {background-color: #e8cd7d;
            }

            #sideNav{
                width: 250px;
                height: 100vh;
                position: fixed;
                right: -250px;
                top:0;
                background: #6c5613;
                z-index: 2;
                transition: .5s;
            }
            nav ul li{
                list-style: none;
                margin: 50px 20px;
            }
            nav ul li a{
                text-decoration: none;
                color: #fff;
            }
            #menuBtn{
                width: 50px;
                position: fixed;
                right: 65px;
                top: 35px;
                z-index: 2;
                cursor: pointer;
            }

        </style>
    </head>
    
    <body>
        <div style="font-family: 'Gabriela', serif;   font-size: 40px;
            text-align: center;
            margin: 20px;
        ">Our Customers</div>

        <table>
        <tr>
            <th>Sr.No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Balance</th>
            <th>Details</th>
        </tr>


        <?php
        // Connecting to the Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bank";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }


        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            

            // We can fetch in a better way using the while loop
            while($row = mysqli_fetch_assoc($result)){
                // echo var_dump($row);
            
                
                echo "<tr>";
            echo '<form method ="post" action = "Details.php">';
            echo "<td>" . $row["S.No."]. "</td><td>" . $row["name"] . "</td>
            <td>" . $row["email_id"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["balance"] . "</td>";
            echo "<td ><a href='Details.php?user={$row["name"]}&message=no' type='button' name='user'  id='users1' ><span>View</span></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        }
        ?>
        </section>
            <nav id="sideNav">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="user.php">OUR CUSTOMERS</a></li>
                    <li><a href="history.php">TRANSACTION HISTORY</a></li>
                    <li><a href="user.php">TRANSFER MONEY</a></li>
                    <li><a href="https://internship.thesparksfoundation.info/">ABOUT US</a></li>
                </ul>
            </nav>

            <div id="moon">
                <img src="images/nav.jpg" id="menuBtn">
            </div>

            <script>
                let menuBtn = document.querySelector('#moon');
                    let sideNav = document.querySelector('#sideNav')
                
                    let condition = true;

                menuBtn.addEventListener('click',function(){
                    if(condition){
                        sideNav.style.right = '0px';
                        condition = false;
                    }
                    else{
                        sideNav.style.right = '-250px';
                        condition = true;
                    }
                })
            </script>
            
        </table>
    </body>
</html>