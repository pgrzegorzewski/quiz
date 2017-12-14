function addNewQuestion(button)
{
	button.hidden = true;
	var id = Number(button.id) + 1;
		
	var questionTemplate = $("#questionTemplate").html();
	
	$("#question_container").append(questionTemplate.replace(/{{id}}/g, id));
}

function addAnswears(select)
{
	select.disabled = true;
	
	var id = select.id.slice(-1);
	console.log(id);
	
	var answearContainer = '#question_answears_container_' + id;
	console.log(answearContainer);
	
	var questionAnswearTemplate = $("#questionAnswearsTemplate").html();
	$(answearContainer).append(questionAnswearTemplate.replace(/{{id}}/g, id));
	
	var activeAnswears = select.options[select.selectedIndex].value;
	
	showAnswears(activeAnswears, id);
	
	
}

function showAnswears(activeAnswears, id)
{
	var classString = "questionAnswear" + id;
	
	var answears = document.getElementsByClassName("questionAnswear" + id);
	
	console.log(answears.length);
	for (i = 0; i < activeAnswears; i++) {
	    answears[i].hidden = false;
	}
}

