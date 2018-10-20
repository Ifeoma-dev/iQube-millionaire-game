<!DOCTYPE html>
<html>
<head>
	<title>Questions - Who wants to be a Millionaire</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="toastr.css">
</head>
<body>
	<div class="main_container">
		<div class="jumbotron">
			<center>
			<input type="hidden" name="currentQ" id="currentQ">
			<div class="content-section">
				<div class="priceSection">&#8358;<span id="priceSection"></span></div>

				<div id="questionSection">
					<span id="qSection"></span>

					<ul id="aSection" >
					</ul>

					<input type="text" id="answerBox" name="answerBox" placeholder="Enter your Preffered Answer">
				</div>

				<button onclick="fetchCorrect()">Next</button>

			</div>
			</center>
		</div>
	</div>

	<script type="text/javascript">
		var questions = [
			{ 'question' : 'Who is the Giant of Africa' , 'answers': 
				[
			 		{'answer': 'Nigeria', 'status': 'correct', 'price': '100'},
			 		{'answer': 'Zimbabwe', 'status': 'wrong','price': '200'},
			 		{'answer': 'Sierra Leone', 'status': 'wrong', 'price': '300'}
			 	]
			},
			{
				'question' : 'Who is the Giant of England' , 'answers': 
				[
			 		{'answer': 'Rainbow', 'status': 'correct', 'price': '200'},
			 		{'answer': 'Togo', 'status': 'wrong'},
			 		{'answer': 'Nigeria', 'status': 'wrong'}
			 	]
			},
			{
				'question' : 'Who is the King of Newyork' , 'answers': 
				[
			 		{'answer': 'Rapheal', 'status': 'correct', 'price': '200'},
			 		{'answer': 'Kendrick', 'status': 'wrong'},
			 		{'answer': '2pac', 'status': 'wrong'}
			 	]
			}
		]

		document.getElementById('qSection').innerHTML = questions[0].question
		questions[0].answers.map((s) => {
  			console.log(s.answer)
  			var newDiv = document.createElement('li')
  			// newDiv.type = 'checkbox'
  			// newDiv.name = s.answer
  			// newDiv.value = s.answer
  			var newContent = document.createTextNode(s.answer)
  			newDiv.appendChild(newContent)

			document.getElementById('aSection').appendChild(newDiv)  			
			
		} )
		var currentQuestion = 0
		var prices = 0
		document.getElementById('currentQ').value = 0
		
		function fetchCorrect()
		{
			correctAnswer = document.getElementById('answerBox').value;
			var lason =questions[currentQuestion].answers.filter((word) => {

				//word.answer == correctAnswer && word.status == 'correct'
				if(word.answer == correctAnswer && word.status == 'correct')
				{
					prices= prices + parseInt(word.price)
				}
			})
			document.getElementById('priceSection').innerHTML = prices
			document.getElementById('answerBox').value = ''
			getNextQuestion()
		}
		function getNextQuestion()
		{
			document.getElementById('aSection').innerHTML = ''
			var newQuestion  = currentQuestion + 1
			var newQuestionObject = questions[newQuestion]
			document.getElementById('qSection').innerHTML = newQuestionObject.question
			correctAnswer = document.getElementById('answerBox').value;

			var lason =newQuestionObject.answers.filter((word) => {

				word.answer == correctAnswer && word.status == 'correct'
			})
			console.log(lason)
			newQuestionObject.answers.map((s) => {
  			console.log(s.answer);
  			var newDiv = document.createElement('li')
  			var newContent = document.createTextNode(s.answer)
  			newDiv.appendChild(newContent)
			document.getElementById('aSection').appendChild(newDiv) 
			
		} )
			
			currentQuestion++
			


		}
	</script>
</body>
</html>