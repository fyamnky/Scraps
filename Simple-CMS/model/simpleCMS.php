<?php

class simpleCMS {
  var $host;
  var $username;
  var $password;
  var $table;

  public function __construct($host, $username, $password, $table){
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->table = $table;
  }

  public function display_public() {
    $entrydisplay ='';
    $query = "SELECT * FROM testdb ORDER BY created DESC LIMIT 3";
    $result = mysql_query($query);
    if($result !== false && mysql_num_rows($result) > 0){
      while ($rows = mysql_fetch_assoc($result)) {
        $title = stripslashes($rows['title']);
        $bodytext = stripslashes($rows['bodytext']);
        $entrydisplay = $entrydisplay.<<<ENTRY_DISPLAY
  <h2>$title</h2>
  <p>
    $bodytext
  </p>
ENTRY_DISPLAY;
      }
    }else{
        $entrydisplay = <<<ENTRY_DISPLAY
          <h2>404 Page Not Found</h2>
          <p>
            No entries have been made on this page. 
            Please check back soon, or click the
            link below to add an entry!
          </p>
ENTRY_DISPLAY;
      //error message
    }
    $entrydisplay = $entrydisplay.<<<ADMIN_OPTION

    <p class="admin_link">
      <a href="{$_SERVER['PHP_SELF']}?admin=1">Add a New Entry</a>
    </p>

ADMIN_OPTION;
    return $entrydisplay;
  }

  public function display_admin() {
    return <<<ADMIN_FORM
      <form action = "{$_SERVER['PHP_SELF']}" method = "post">
        <label for="title">Title:</label>
        <input name="title" id="title" type="text" maxlength="150" />
        <label for="bodytext">Body Text:</label>
        <textarea name="bodytext" id="bodytext"></textarea>
        <input type="submit" value="Create this entry!" />
      </form>

ADMIN_FORM;
  }

  public function write($post) {
    if(isset($post['title'])){
      $title = mysql_real_escape_string($post['title']);
    }
    if(isset($post['bodytext'])){
      $bodytext = mysql_real_escape_string($post['bodytext']);
    }
    if($title && $bodytext){
      $created = time();
      $sql = "INSERT INTO testdb VALUES('$title', '$bodytext', '$created')";
      $result = mysql_query($sql);
      return $result;
    }else{
      return false;
    }
    /*
    $all_params_exist = isset($post['title']) && isset(post['bodytext']);
    if ($all_params_exist){
      $title = mysql_real_escape_string($post['title']);
      $bodytext = mysql_real_escape_string($post['bodytext']);
      created = time();
      $sql = INSERT INTO testdb VALUES ('$title', '$bodytext', '$created');
      return mysql_query($sql);
    }else{
      return false;
    }

    */
    
  }

  public function connect() {

    mysql_connect($this->host, $this->username, $this->password) or die("Unable to connect to database server! ".mysql_error());
    mysql_select_db($this->table) or die("Unable to select database table! ".mysql_error());

    return $this->buildDB();
  }

  private function buildDB() {
    $sql = <<<MYSQL_QUERY
      CREATE TABLE IF NOT EXISTS testdb (
        title VARCHAR(150)
        bodytext TEXT
        created VARCHAR(100)
    )
MYSQL_QUERY;
    return mysql_query($sql);
  }

}
?>