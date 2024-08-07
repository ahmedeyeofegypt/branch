<?php 

if(isset($_POST['api'])){
    session_start() ;
    require_once('connection.php');
    if(isset($_POST['func'])){
        if($_POST['func'] == 'getDetails') {            
            $result = $conn->query("SELECT * FROM packages WHERE id=" . $_POST['id']) ;
            while($row = $result->fetch_assoc()){$myArray[] = $row;} ;
            $conn->close();
            echo json_encode($myArray);
        }
    }
    return ;
}


// Get data from server 
$result = $conn->query("SELECT * FROM packages ;") ;
if($result){
    if(!$result->num_rows > 0){
        echo "No PAckages found" ;
    }
}

?>


<h2>Packages</h2>
<p>Here you can add and update all packages information. </p>
<hr>

<h3>Packages List</h3>

<div class="pack-list">
    <table>
        <thead>
            <tr>
                <th style="width:40px; "><input type="checkbox"></th>
                <th style="width:40px; ">ID</th>
                <th style="width:100%; ">Package Name</th>
                <th style="width:100%; ">Section</th>
                <th style="width:100%; ">Category</th>
                <th style="width:100%; ">Sub Category</th>
                <th style="width:80px; ">add date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0 ;
        while($row=$result->fetch_assoc() ){
            $i++ ;
            echo '<tr>';
            echo ' <td><input type="checkbox"></td>' ; 
            echo ' <td>'.$i.'</td>';
            echo ' <td onclick="showDetails('.$row['id'].')">'.$row['Name'].'</td>';
            echo ' <td>'.$row['Section'].'</td>';
            echo ' <td>'.$row['Category'].'</td>';
            echo ' <td>'.$row['SubCategory'].'</td>';
            echo ' <td>'.$row['id'].'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>

        <tfoot>
            <tr><td></td></tr>
        </tfoot>
        

    </table>

    <div class="table-control">
        
        <img class="menu-icon" src="shared/svg/keyboard_arrow_left.svg">
        <span style="font-size:0.7rem;">1 of 12 </span>
        <img class="menu-icon" src="shared/svg/keyboard_arrow_right.svg">
        <img class="menu-icon" src="shared/svg/delete2.svg">
    </div>
</div>




<h3 id="frm-head" class="margin-top32">Package Details</h3>

<form action="" id="frm-details">
    <fieldset>
        <legend>Basic Information</legend>
        <label for="name">Name</label>
        <input type="text" id="name">

        <label for="date">Name</label>
        <input type="text" id="date">
    </fieldset>

    <fieldset>
        <legend>Details </legend>
        <label for="name">Name</label>
        <input type="text" id="name">

        <label for="date">Name</label>
        <input type="text" id="date">
    </fieldset>
    <fieldset>
        <legend>Price List</legend>
        <label for="name">Name</label>
        <input type="text" id="name">

        <label for="date">Name</label>
        <input type="text" id="date">
    </fieldset>

    <fieldset class="break">
        <legend>Description </legend>
        <textarea rows="4"></textarea>
    </fieldset>

    <fieldset>
        <legend>Images</legend>
        <label for="name">Choose files</label>
        <input type="file" id="name">
    </fieldset>

    <fieldset class="break no-border">
        <input type="button" value="Update Package" disabled>
        <input type="button" value="New Package" onclick="newpack()">

        <input type="checkbox" id="enabled">
        <label for="enabled">Enable this package</label>
    </fieldset>

</form>


<script>
    function newpack(){
        setTimeout(() => {
            
            var data = "api=true";
            var apiUri  = "/cms/package.php" ;
            const req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                   // console.log(this.responseText) ;
                };
            };
            req.open("POST", apiUri, false);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send(data);
        }, 200);
    }


    function showDetails(id){
        // clear All form data First 
        
        
        
        document.getElementById('frm-head').scrollIntoView({block: "start", behavior: "smooth"});

        setTimeout(() => {
            
            var data = "api=true&func=getDetails&id="+id;
            var apiUri  = "/cms/package.php" ;
            const req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    //console.log(this.responseText) ;
                    let obj = JSON.parse(this.responseText) ;
                    document.getElementById('name').value = obj[0].Name
                    //document.getElementById('name').value = obj[0].Name

                };
            };
            req.open("POST", apiUri, false);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send(data);
        }, 200);
    }
    
</script>
