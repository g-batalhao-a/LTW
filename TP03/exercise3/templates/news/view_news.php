<html lang="en-US">
    <section id="news">
      
      <article>
        <header>
        <h1>
        <?php if (array_key_exists('username',$_SESSION) && !empty($_SESSION['username']) && $article['username']==$_SESSION['username']) {?>
          <a href="edit_news.php?id=<?= $article['id']?>"><?= $article['title']?></a>
        <?php } else {?>
          <a href="news_item.php?id=<?= $article['id']?>"><?= $article['title']?></a>
        <?php }?>
      </h1>
        </header>
        <img src="https://picsum.photos/200/300<?= $tags[0]?>" alt="">
        <p><?= $article['introduction']?></p>
        <p><?= $article['fulltext']?></p>
        
        <section id="comments">
          <h1><?= count($comments)?> Comments</h1>
          <?php foreach ($comments as $comment) {?>
            <article class="comment">
              <span class="user"><?= ucfirst($comment['username'])?></span>
              <span class="date"><?= date(DATE_RSS, $comment['published'])?></span>
              <p><?= $comment['text']?></p>
            </article>
          <?php }?>
          <form>
            <h2>Add your voice...</h2>
            <label>Username 
              <input type="text" name="username">
            </label>
            <label>E-mail
              <input type="email" name="email">
            </label>
            <label>Comment
              <textarea name="comment"></textarea>            
            </label>
            <input type="submit" value="Reply">
          </form>
        </section>
        <footer>
          <span class="author"><?= ucfirst($article['username']) ?></span>
          <span class="tags">
            <?php foreach($tags as $tag) {?>
              <a href="list_news.php"><?= $tag?></a>
            <?php }?>
          </span>
          <span class="date"><?= date(DATE_RSS, $article['published'])?></span>
          <a class="comments" href="news_item.php?id=<?= $article['id']?>"><?= count($comments)?></a>
         
        </footer>
        
        <?php if (array_key_exists('username',$_SESSION) && !empty($_SESSION['username']) && $article['username']==$_SESSION['username']) {?>
          <section id="delete">
          <a class="delete" href="delete_news.php?id=<?= $article['id']?>">DELETE</a>
          </section> 
          <?php } ?>
        
      </article>
    </section>
</html>