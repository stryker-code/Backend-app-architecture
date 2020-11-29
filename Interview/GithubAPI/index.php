<!DOCTYPE HTML>
<html lang="en">
    <meta charset="utf-8">
    <title>Find repositories</title>

    <head>
        <!-- CDN Bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="css/style.css"/>       
    </head>

    <body>
        <div class="container">
            <form action="" class="form-inline">
                <select name="fields" id="fields" class="form-control">
                    <option value="" disabled selected>Fields</option>
                    <option value="size">Size</option>
                    <option value="forks">Forks</option>
                    <option value="stars">Stars</option>
                </select>
                <select name="operators" id="operators" class="form-control">
                    <option value="" disabled selected>Operators</option>
                    <option value=">">></option>
                    <option value="<"><</option>
                    <option value="=">=</option>
                </select>          
                <input name="fieldalue" type="text" id="number" class="form-control" placeholder="Value">
                <button id="delete" class="btn btn-danger" type="button">Delete</button> 
                <div id="area-rules">             
                </div>     
                <hr>         
                <button id="apply" class="btn btn-primary" type="button">Apply</button>
                <button id="clear" class="btn btn-warning" type="button">Clear</button>
                <button id="add-rule" class="btn btn-success" type="button">Add Rule</button>  
                <hr>
                <div id="result-set">             
                </div>             
            </form>
        </div>       
        <!-- CDN Bootstrap js -->      
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
       <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        <!-- User define scrips -->   
       <script src="js/validation.js"></script>
       <script src="js/rules.js"></script>
    </body>

</html>