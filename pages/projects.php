<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Adam Bičiště; you can find here my projects, experiences, social links, contact, hobbies and much more."
    />
    <meta
      name="keywords"
      content="Adam Bičiště, Adam Biciste, Portfolio, Projects, Contact, Work, Social,Links"
    />
    <link rel="shortcut icon" type="image/x-icon" href="../images/csharp.ico" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      type="text/css "
      href="../styles/index.css"
      media="all"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../styles/print.css"
      media="print"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins&display=swap"
      as="style"
      rel="preload"
      onload="this.onload=null;this.rel='stylesheet'"
    />
    <link rel="canonical" href="https://janmaruscak.cz/pages/projects.html" />
    <title>Adam Biciste - projects</title>
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=G-715BR72JVC"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "G-715BR72JVC");
    </script>
  </head>
  <body>
    <div id="loading">
      <p>Loading</p>
      <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <nav id="navbar">
      <ul id="navbarUl">
        <li><a href="../index.html">Home</a></li>
        <li class="selected"><a href="./projects.php">Index</a></li>
        <li><a href="./resume.pdf">Resume</a></li>
        <li><a href="./contact.html">Contact</a></li>
      </ul>
      <div id="darkModeSlider" onclick="ToggleDarkMode(this)">
        <img src="../images/color-mode/moon.png" alt="moon" />
        <img src="../images/color-mode/sun.png" class="sun" alt="sun" />
      </div>
      <div class="hamburger-container">
        <div class="hamburger" onclick="ToggleMobile()">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </nav>
    <main>
?>  


      <h1>My index</h1>
<?php
        if(isset($_POST['buttonIP'])) {
          echo '<script type="text/javascript">
          window.onload = function () { alert("User IP Address: '.$_SERVER['REMOTE_ADDR']. '"); } 
   </script>'; 
         }

    if(isset($_POST['SubmitButton'])){ 
      $conn = mysqli_connect("mariadb_pis", "root", "root", "index");
$subject = $_POST['subject'];
$mark = $_POST['mark'];
$date = $_POST['date'];
$note = $_POST['note'];

$query= 'INSERT INTO `grades`(`subject`, `mark`, `note`, `date`) VALUES ("'. $subject .'","'. $mark .'","'. $note .'","' . $date .'")'; 
if(mysqli_query($conn, $query)){
    
    echo '<script type="text/javascript">
           window.onload = function () { alert("Grade added!"); } 
    </script>'; 

}
else{
    echo '<script type="text/javascript">
    window.onload = function () { alert("Error!"); } 
</script>';
}
  }

?>


  <div class="project-table">      
      <div class="project">
        <form action="#" method="post">
        <h2>Add grades!</h2>

        <label for="subject">Subject</label> <select id="subject" name="subject">
  <option value="Math" id="Math" type="Math">Math</option>
  <option value="Physics" id="Physics" type="Physics">Physics</option>
  <option value="Electronics" id="Electronics" type="Electronics">Electronics</option>
</select> <br>
        <label for="mark">Mark</label> <input type="number" name="mark" id="mark"> <br>
        <label for="note">Note</label> <input type="text" name="note" id="note"><br>
        <label for="date">Date</label> <input type="date" name="date" id="date"><br>
        <input  type="submit" name="SubmitButton" value="Add grade!">
        </form>
        
      </div>
  </div>
      <?php
        $conn = mysqli_connect("mariadb_pis", "root", "root", "index");
        $query = "SELECT subject FROM subjects";
        $data = mysqli_query($conn, $query);

        foreach ($data as $key=>$val)
        {
          $subj = $val['subject'];
          $queryGrades ="SELECT subject,mark,note,date FROM grades WHERE subject='$subj'";
          $data2 = mysqli_query($conn, $queryGrades);
      ?>

      <div class="project-table">


            <h2><?php echo  $subj ?></h2>
            

      <?php
        while($row = mysqli_fetch_assoc($data2)) 
          {
      ?>
         
        <p>Mark: <?php echo $row['mark']?>&nbsp;&nbsp;    Date: <?php echo $row['date']?>&nbsp;&nbsp;    Note: <?php echo $row['note']?></p>
      <?php
          }
      "</div>";
        }


      mysqli_close($conn);
      ?>
<form method="post">
        <input type="submit" name="buttonIP"  value="Show IP"/>
    </form>
    </main>
    <footer>
      <h3>SOCIAL LINKS:</h3>
      <div class="links">
        <div class="link">
          <a
            href="https://github.com/Ad4mCZ"
            id="github"
            aria-label="github link"
          >
            <svg
              aria-hidden="true"
              focusable="false"
              data-prefix="fab"
              data-icon="github"
              role="img"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 496 512"
            >
              <path
                d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
              ></path>
            </svg>
          </a>
          <p>Github</p>
        </div>
        <div class="link">
          <a
            href="https://www.linkedin.com/in/adambiciste/"
            id="linkedin"
            aria-label="linkedin link"
          >
            <svg
              aria-hidden="true"
              focusable="false"
              data-prefix="fab"
              data-icon="linkedin"
              role="img"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 448 512"
            >
              <path
                d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"
              ></path>
            </svg>
          </a>
          <p>LinkedIn</p>
        </div>
        <div class="link">
          <a
            href="https://www.instagram.com/adam.biciste/"
            id="instagram"
            aria-label="instagram link"
          >
            <svg
              aria-hidden="true"
              focusable="false"
              data-prefix="fab"
              data-icon="instagram"
              role="img"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 169.063 169.063"
            >
              <path
                d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752
            c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407
            c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752
            c17.455,0,31.656,14.201,31.656,31.655V122.407z"
              />
              <path
                d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561
            C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561
            c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z"
              />
              <path
                d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78
            c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78
            C135.661,29.421,132.821,28.251,129.921,28.251z"
              />
            </svg>
          </a>
          <p>Instagram</p>
        </div>
      </div>
    </footer>
    <script src="../script.js"></script>
  </body>
</html>
