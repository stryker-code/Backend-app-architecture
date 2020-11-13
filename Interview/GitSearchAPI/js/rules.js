$(window).on('load', function(){

	// Search array
	var rulesArray = [];
	var fieldNames = []; 	
	var $rulesContainer = $('#area-rules');
	var $resultSet = $('#result-set');

	// Render added rules
	function render($currentArray) {
		$rulesContainer.empty();
		if ($currentArray.length == 0) {
			return
		} 
		var table = "";
		var last = $currentArray.length - 1;
		table +='<table>';
		table += '<tr>';
		$.each($currentArray, function(key, value) {								
			table += '<td>' + value.name + '</td>';
			table += '<td>' + value.operator + '</td>';	
			table += '<td>' + value.value + '</td>';	
			table += '<td>' + '&nbsp' + '&nbsp' + '</td>';					
		});	
		table +='</tr>';
		table +='</table>';
		$rulesContainer.append(table);	
	}

	// Add current object to array
	function addCurrnetObject() {		
		if (!$("form").valid()) {
    		 return
    	}
    	var ruleObject = {}
		$fieldName = $('#fields').val();
    	$operator = $('#operators').val();
    	$value = $('#number').val();    	
    	if (fieldNames.indexOf($fieldName) != -1) {
			return
		}		
		fieldNames.push($fieldName);
		ruleObject.name = $fieldName;
		ruleObject.operator = $operator;
		ruleObject.value = $value;
		rulesArray.push(ruleObject);
		render(rulesArray);
	}

	function isRuleExist(){
		if (rulesArray.length == 0) {
			alert('There is nothing to delete');
			return false;
		}
		return true;
	}

	$('#add-rule').on('click', function() {	
    	addCurrnetObject();
    });

	$('#apply').on('click', function(){
		if (rulesArray.length > 0) {
			var param = ""; 	
			var replaceChar;
			$.each(rulesArray, function(key, val) {	
				replaceChar = val.operator
				if (replaceChar == "=") {
					replaceChar = ""
				}
				param +='/' + val.name + ":" + replaceChar + val.value;				
			});	
			
			$.ajax({
	
		    		type 	: "GET",
					url  	: "getJSON.php",
					data    : "query=" + param, 
					dataType: "json",
					
					success: function(data) {
								$resultSet.empty();
								var content = "";
								var i = 0;
								content += '<p><b> Repositories: </b>' + data.total_count + '</p>';	
								$.each(data.items, function(key, val) {
									i++;
									content += '<p><a href="'+ val.html_url + '"><b>' + val.full_name + '</b></a></p>';									
									content +=  'content-size: ' + val.size + '<br>';
									content +=  'forks: ' + val.forks_count + '<br>'; 
									content +=  'stars: ' + val.stargazers_count + '<p>';	
									content +=  'counter: ' + i + '<br>'; 										
								});	
								$resultSet.append(content);		   		
							},
									 		
					error: 	function(data,status) {
								alert(status);
						 	}
			}); 
		} else {
			alert ('Rules is empty')
		  }
	});

	$('#clear').on('click', function(){
		if (!isRuleExist()) {
			return
		}
		rulesArray = [];	
		fieldNames = [];
		addCurrnetObject();		
	});
	
	$('#delete').on('click', function(){
		if (!isRuleExist()) {
			return
		}
		rulesArray.pop();
		fieldNames.pop();
		render(rulesArray);
	});

});