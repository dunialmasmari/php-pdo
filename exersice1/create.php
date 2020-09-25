<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST['id']) && !empty($_POST['name'])
 &&!empty($_POST['email']) && !empty($_POST['phone']) && 
 !empty($_POST['title']) && !empty($_POST['created'])) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $email, $phone, $title, $created]);
    $msg = 'Created Successfully!';
   
}else{
    $msg = 'fill the inputs plz!';
}
?>
<?=template_header()?>

<div>
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        
        <input type="hidden" name="id" placeholder="26" value="auto" id="id">
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="John Doe" id="name">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="johndoe@example.com" id="email">
        <br>
        <label for="phone">Phone</label>
        <input type="text" name="phone" placeholder="2025550143" id="phone">
        <br>
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Employee" id="title">
        <br>
        <label for="created">Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <br>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>