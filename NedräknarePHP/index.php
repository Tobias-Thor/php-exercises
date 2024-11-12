<!DOCTYPE html>
<!--page is in Swedish-->
<html lang="sv">
<head>
  <!--recommended character-encoding-->
  <meta charset="UTF-8">
  <meta name="description" content="Nedräknare">
  <meta name="keywords" content="Nedräknare, PHP">
  <meta name="author" content="Tobias Thor">
  <!--ease viewing on different screen-sizes-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!--some basic internal css-->
  <style>
  body {
      background-color: black;
  }
  
  h1 {
      color: lightgreen;
      font-family: "Lucida Console", Monaco, Monospace;

} 

  p {
    color: lightgreen;
    font-family: "Lucida Console", Monaco, Monospace;

  }
  </style>

<!--shows up in browser(tab)-->
<title>Nedräknare</title>
<body>
  <h1>Nedräknare skriven i PHP</h1>
    <p>Antal dagar kvar till julafton...</p>

    <?php
    /* Specifies the number of days remaining until Christmas Eve. Creates a timestamp with the mktime function
    for a given date, in this case, Christmas Eve 2024. */
    $christmasEve = mktime(0, 0, 0, 12, 24, 2024);
    
    /* Today's (starting) time. I first tried inserting today's date, but then I got an error message
    when I loaded the file in the browser. The time function shows the current time in UNIX format,
    and the $today variable represents the current time */
    $today = time();
    
    /* Calculates the difference to find out how many days are left until Christmas Eve.
    The $difference variable equals the $christmasEve variable minus the $today variable. */
    $difference = ($christmasEve - $today);
   
    // The difference in months (the end goal) between today's date and the target month.
    $months = date('m', $difference);
    // The difference in days between today's date and Christmas Eve (the end goal).
    $days = date('d', $difference);
    // The difference in hours between today's date and Christmas Eve (the end goal).
    $hours = date('h', $difference);

    /* Displays on the screen the calculation of how many days are left until Christmas Eve. */
    echo $months." months ".$days." days ".$hours. " hours left until Christmas Eve";
  
?>

</head>
</body>
</html>
