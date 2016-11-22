$("document").ready(function(){
	//alert("ready to go!");
	$.ajax({
		url : "ppl.json",
		type : "get" ,
		dataType : "JSON" ,
		error : function(data){
			console.log(data.parsererror);
		},
		success : function(data){
			//alert("got the JSON");
			$.each(data, function(index, value){
				console.log(index);
				console.log(value);
				console.log(value.name);
				console.log(value.birthday);
				console.log(value.register);
				console.log(value.sports);
				console.log(value.faves);
				console.log(value.faves.book);
				console.log(value.faves.song);
				console.log(value.faves.movie);

				var id = value.id;
				var name = value.name;
				var birthday = value.birthday;
				var gender = value.gender;
				var reg = value.register;
				var sports = "";
				$.each(value.sports, function(i,v){
					console.log(v);
					sports = sports + "<li>"+ v +"</li>";

				});
				console.log(sports);
				var book = value.faves.book;
				var song = value.faves.song;
				var movie = value.faves.movie;

				$('#profile').append('<div class = "person" id="'+id+'"></div>');
				$('#' + id).append('<h3>'+id+'</h3>');
				$('#' + id).append('<div class="profileImage"><img src="img/'+id+'.jpg"></div>');
				$('#' + id).append(`
					<h4>NAME: `+name+`</h4>
					<p>
						BIRTHDAY: `+birthday+`<br>
						GENDER: `+gender+`<br>
						REGISTERED ON: `+reg+`<br>
						SPORTS:
					</p>
					<ol>`+sports+`</ol>
					<h5>FAVORITES</h5>
					<p>
						BOOK: `+book+`<br>
						SONG: `+song+`<br>
						MOVIE: `+movie+`<br>
					</p>
					`);
			});
		}
	});
});