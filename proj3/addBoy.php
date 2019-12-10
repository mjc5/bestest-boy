<?php include 'header.php';?>

<div class="text-center card mx-auto mt-5" style="width: 18rem;">

    <form method="post" enctype="multipart/form-data" action="processBoy.php">

        <h3 class="mt-5">Add Pet Details</h3>
        <p class="mt-4">Name:
            <input type="text" name="pet_name" />
        </p>
        <p>Upload Image:
            <input type="file" name="fileToUpload">
        </p>
        <input type="submit" class="btn btn-outline-success mt-3 mb-3 ml-3 mr-3">
    </form>

</div>
</main>
</body>

</html>
