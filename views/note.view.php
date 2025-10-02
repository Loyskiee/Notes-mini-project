<?php require("partials/header.php");?>
<?php require ("partials/nav.php");?>
<?php require ("partials/banner.php");?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
   <!---Will display the note--->
      <p>
        <a href="/practice/controllers/index-notes.php" class="text-blue-500 hover:underline" >Go back</a>
      </p>
      <p> <?=htmlspecialchars($note['body'])?></p>
       <p>
          <a href="/practice/controllers/note-update.php?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">Edit</a>
       </p>

         <form method="POST" action="/practice/controllers/note-delete.php?id=<?= $note['id'] ?>">
            <button type="submit" class="text-red-500 hover:underline">Delete</button>
         </form>
    </div>
</main>
    
 

  <?php require("partials/footer.php");?>