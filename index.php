<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--BOOSTRAP 4.0.0-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <!--this Give us the Font-->
  <link href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css" />

  <!--this is the css Code for the Memo-->
  <style type="text/css" > * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: arial,sans-serif;
            font-size: 100%;
            margin: 3em;
            background: #666;
            color: #fff;
        }

        h2, p {
            font-size: 100%;
            font-weight: normal;
        }

        ul, li {
            list-style: none;
        }

        ul {
            overflow: hidden;
            padding: 3em;
        }

            ul li a {
                text-decoration: none;
                color: #000;
                background: #ffc;
                display: block;
                height: 20em;
                width: 20em;
                padding: 1em;
                -moz-box-shadow: 10px 10px 14px rgba(33,33,33,1);
                -webkit-box-shadow: 10px 10px 14px rgba(33,33,33,.7);
                box-shadow: 10px 10px 14px rgba(33,33,33,.7);
                -moz-transition: -moz-transform .15s linear;
                -o-transition: -o-transform .15s linear;
                -webkit-transition: -webkit-transform .15s linear;
            }

            ul li {
                margin: 1em;
                float: left;
            }

                ul li h2 {
                    font-size: 150%;
                    font-weight: bold;
                    padding-bottom: 10px;
                }

                ul li p {
                    font-family: "Reenie Beanie",arial,sans-serif;
                    font-size: 150%;
                }

                ul li a {
                    -webkit-transform: rotate(-6deg);
                    -o-transform: rotate(-6deg);
                    -moz-transform: rotate(-6deg);
                }

                ul li:nth-child(even) a {
                    -o-transform: rotate(4deg);
                    -webkit-transform: rotate(4deg);
                    -moz-transform: rotate(4deg);
                    position: relative;
                    top: 5px;
                    background: #cfc;
                }

                ul li:nth-child(3n) a {
                    -o-transform: rotate(-3deg);
                    -webkit-transform: rotate(-3deg);
                    -moz-transform: rotate(-3deg);
                    position: relative;
                    top: -5px;
                    background: #ccf;
                }

                ul li:nth-child(5n) a {
                    -o-transform: rotate(5deg);
                    -webkit-transform: rotate(5deg);
                    -moz-transform: rotate(5deg);
                    position: relative;
                    top: -10px;
                }

                ul li a:hover, ul li a:focus {
                    box-shadow: 10px 10px 7px rgba(0,0,0,.7);
                    -moz-box-shadow: 10px 10px 7px rgba(0,0,0,.7);
                    -webkit-box-shadow: 10px 10px 7px rgba(0,0,0,.7);
                    -webkit-transform: scale(1.25);
                    -moz-transform: scale(1.25);
                    -o-transform: scale(1.25);
                    position: relative;
                    z-index: 5;
                }

        ol {
            text-align: center;
        }

            ol li {
                display: inline;
                padding-right: 1em;
            }

                ol li a {
                    color: #fff;
                }
    </style>
  </head>
<body>
 <?php

  //require_once('connectvars.php');
  //require_once('login.php');
  //$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('Cannot connect to Database');
  //mysqli_set_charset($dbc, "utf8") or die ('Could not set utf-8');
  //$query = "SELECT * FROM bulletin WHERE connected_to=userID";


 ?> 

  <!-- FROM HERE YOU CAN START YOUR HTML -->
 <div>
     <h1>Crate a New MeMo</h1>

     <!--The Code for New MeMo--> 
     <form id="myMemo" action="/action_page.php">
         Memo Title:
         <input type="text" name="TitleName" maxlength="15" />
         <br />
         MeMo Text:
         <input type="text" name="MemoText" maxlength="50" />
         <br />
         Memo Link:
         <input type="text" name="MemoLink" maxlength="20" />
         <br />
         Picture Link:
         <input type="text" name="PictureMemoLink" maxlength="20" />
         <br />
         <br />
         <input type="button" onclick = "myFunction()" value= "Submit Memo" />
     </form >

         <script>
             function myFunction() {
                 document.getElementById("myMemo").submit();
             }
     </script>
 </div>

<!-- This is the Memo Code -->
  <div>
      <ul>
          <li>
                  <!--Add link to make the Memo A Click Button-->
              <a id="IdMemoLink" href="url">

                  <h2 id="IdTitleName">Title MyFirstMeMo</h2>
                  <p id="IdMemoText">Sup Shahar this is a Cool MeMo Bla Bla BLa</p>
                  <h3 >Picture</h3>
                  <img id="IdPictureMemo" src="http://www.hitentertainment.com/corporate/images/brands/bobBuilder/BTB_KIDSCREEN_AD__Croped_V1.jpg" style="width:100px; height:100px;" />
              </a>
              
          </li>
          <li>
      </ul>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
