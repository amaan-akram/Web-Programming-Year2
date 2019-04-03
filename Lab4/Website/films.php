<head>
<title>Lab 4 Film Search</title>
    
    <link rel="stylesheet" type="text/css" href="films.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
  </script>
      
  <script type="text/javascript" src="js/ajax.js"></script>
    
</head>

<body>
    <header> <h1 style="text-align: center;">Film Search</h1></header>
    
    
    
    <form id="search" action="films.php">
		SEARCH!
    <br><input id="input" type="text" name="search1">
    <input id="button" type="button" value="Submit">
    </form>
    
    
    <?php 

        $jsondata = file_get_contents("http://www.omdbapi.com/?apikey=2b4f0733&t=Lord_Of_The_Rings");
        $json = json_decode($jsondata, true);
        $output = $json['Poster']
       ?> 
    <div id ="output"></div>
    <img src = " <?php echo $output; ?>" >
</body>
