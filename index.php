<?php 
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>

    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
    <div class="mb-3">
    <label for="firstname">First Name</label>
    <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>

    <div class="mb-3">
    <label for="lastname">Last Name</label>
    <input required type="text" class="form-control" id="lastname" name="lastname">
  </div>

  <div class="mb-3">
    <label for="dob">Date Of Birth</label>
    <input type="text" class="form-control" id="dob" name="dob">
  </div>

  <div class="mb-3">
    <label for="specialty">Area Of Expertise</label>
    <select class="form-control" id="specialty" name="specialty">
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>  
            <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']?></option>
        <?php } ?>
    <!--option value="1">Database Admin</option>
      <option>Software Developer</option>
      <option>Web Administrator</option>
      <option>Other</option-->
      
    </select>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary btn-block" >Submit</button>
</form>
<?php require_once 'includes/footer.php'; ?>