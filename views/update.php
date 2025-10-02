<?php require("partials/header.php");?>
<?php require ("partials/nav.php");?>
<?php require ("partials/banner.php");?>



<main>
    <form method="POST">
        <div class="col-span-full">
          <label for="body" class="block text-sm/6 font-medium text-gray-900">Enter Text:</label>
          <div class="mt-2">
            <textarea
              id="body"
              name="body"
              placeholder="Here's an idea for note" 
              rows="3"
              class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
            ><?= htmlspecialchars($_POST['body'] ?? $note['body']) ?></textarea>

            <?php if(isset($errors['body'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button 
            type="submit" 
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Update
          </button>
        </div>
    </form>
</main>


 
  <?php require("partials/footer.php");?>