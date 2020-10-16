<html lang="en-US">
  <form action="action_add_news.php" method="POST">
  <h2>Add</h2>
    Title <input type="text" name="title">
    <label>Introduction
        <textarea name="introduction" cols="37" rows="4"></textarea>
    </label>
    <label>Full Text
        <textarea name="fulltext" cols="37" rows="40"></textarea>            
    </label>
    <label>Tags (separated by commas)
        <textarea name="tags" cols="37" rows="40"></textarea>            
    </label>
    <input type="submit" value="Submit">
  </form>
    
</html>