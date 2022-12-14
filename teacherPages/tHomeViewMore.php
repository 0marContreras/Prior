<!--Checa si el usuario esta logueado o no-->
<?php 

session_start();

if (isset($_SESSION['email'])) {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Prior</title>

    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/navteacher.css">
    <link rel="stylesheet" href="../Styles/items.css">
    <link rel="stylesheet" href="../Styles/home.css">

</head>
<body>

<!--Notch/navbar-->

    <!--esto hace que se fije arriba-->
    <div class="container-sm text-center sticky-top">
        <div class="row">  <!--Lo acomoda en la parte de ariba de la pag-->
          <div class="col-10">



          <div class="notch-container">
            <div class="notch sticky-top">
                <ul>
                    

                    <li class="notch-list">
                        <a href="../teacherPages/tideas.php">
                            <span class="notch-icon notch-ideas"><ion-icon name="rainy-outline"></ion-icon></ion-icon></span>
                            <span class="notch-text notch-ideas-text">Ideas</span>
                        </a>
                    </li>
                    <li class="notch-list">
                        <a href="../teacherPages/tHome.php">
                            <span class="notch-icon notch-home"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="notch-text notch-home-text">Home</span>
                        </a>
                    </li>
                    <li class="notch-list">
                        <a href="../teacherPages/evaluation.php">
                            <span class="notch-icon notch-evaluation"><ion-icon name="checkmark-circle-outline"></ion-icon></span>
                            <span class="notch-text notch-evaluation-text">Evaluation</span>
                        </a>
                    </li>
                   
                    <li class="notch-list">
                      <a href="../teacherPages/tMyuser.php">
                          <span class="notch-icon notch-myuser"><ion-icon name="person-circle-outline"></ion-icon></span>
                          <span class="notch-text notch-myuser-text">My user</span>
                      </a>
                  </li>

                </ul>
            </div>
<!--esto hace que se fije arriba-->
</div>
</div>
</div>
          
<!--Notch/navbar-->
        <br>
        <div class="col-12 ">

            <div class="container">
                <div class="card mb-3 bg-black text-light">
                  <img class="project-logo bg-light "  src="../images/moscas.png" alt="...">
                  <div class="card-body">
                    <h4 class="card-title">TL Notes</h4>
                    <h5 class="card-title">Mosquera Studios</h5>

                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt provident odit atque vero officiis animi distinctio cumque iste eveniet nam, consequuntur labore rerum ipsa iusto rem quas laboriosam laborum nobis?
                    Reiciendis perferendis maiores enim doloribus facere veniam asperiores accusamus, tempore nam reprehenderit sed sunt sint dolorem quis libero, incidunt dolor labore officiis culpa, itaque possimus maxime necessitatibus? Eum, quia ea?
                    Neque optio natus, explicabo temporibus suscipit amet! Eius quisquam ipsa consequuntur pariatur facere quod deserunt, fugiat nostrum? Velit illum consequatur quibusdam! Tempore voluptates voluptatem aliquam architecto consequatur? Modi, et iste.
                    Maiores, quis? Accusantium tempora ab est consequuntur, nam doloremque itaque voluptatibus modi ullam sequi corrupti voluptate iste et laudantium illo minima animi saepe, voluptatum fugiat dignissimos voluptas commodi molestiae. Illo?
                    Quam tempora autem repellat repellendus quo expedita corrupti tempore voluptate ea, itaque assumenda voluptates praesentium sunt eius inventore quis quos maxime ex laudantium laboriosam aliquam? Eligendi ex repellat vero harum?
                    Odio fugit nostrum ipsa. Cumque, dolorum, voluptatibus mollitia consectetur similique odit accusamus libero harum iusto impedit earum, nam tempore fugiat dolorem iste! Odio esse architecto perferendis libero numquam unde eaque?
                    Accusamus impedit magni vero molestiae saepe, eveniet nisi perferendis nulla doloribus eum nam cumque. Dolores, dignissimos ratione commodi fugit, consequuntur quam aspernatur a rerum tenetur delectus eaque ipsum maxime in.
                    Eligendi animi minus doloribus illo tenetur, qui neque quibusdam at deserunt quidem aliquam temporibus optio id eius vel nemo impedit voluptatibus, rem soluta rerum! Nam nihil consectetur id natus corrupti.
                    Ducimus perspiciatis provident vel, dignissimos quod repellat tempore saepe, rerum fuga nihil tenetur fugit eos corrupti at quibusdam aliquid eligendi assumenda culpa distinctio illum id quis cumque? Fugit, odit ipsum?
                    Sunt fuga sit earum nisi, minima, quis a nam quod iste quidem maxime accusamus non eos voluptatem voluptatum animi consequatur alias amet perferendis id odit obcaecati illo numquam sapiente. Nemo?.</p>
                    
                    <h3>Comments:</h3>


                     <form action=""> <!--Aqui va el script php-->

                        <div class="card bg-dark text-light">
                            <h5 class="card-header"><label name="project-comment-title">Comment:</label></h5>
                            <div class="card-body">

                                <div class="form-floating text-dark">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="new-project-com" id="new-project-com"></textarea>
                                    <label for="new-project-com">Comment</label>
                                  </div>
                                  <br>
                                  
                            <button class="btn btn-happy" type="submit">Publish</button>    
                            </div>
                        </div>
                    </form>
                    <br>


                    <div class="card bg-dark text-light">
                        <h5 class="card-header"><label name="project-comment-title">TIDBIS31M</label></h5>
                        <div class="card-body">
                          <h5 class="card-title"><label name="project-comment-name">Javier tokyo</label></h5>
                          <p class="card-text"><label name="project-comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quia fugit molestias placeat consequuntur amet deleniti, mollitia cumque sequi inventore consequatur ullam ad nesciunt! Neque mollitia cum iusto obcaecati eius..</label></p>
                        </div>
                      </div>
       </div> 
       </div>
       </div>
       </div>

       
       <br><br><br><br>
       <div class="prior-footer sticky-bottom">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
     </div>


<!--Connections-->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <!--Icons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<!--Si no esta logueado pa atr??s papa-->
<?php 

}else{

     header("Location: ../Pages/login.php");

     exit();

}

 ?>