function exec(){
	var inputComando = document.getElementsByName("command")[0].value;
	var user = document.getElementsByName("user")[0].value;
	var token = document.getElementsByName("token")[0].value;

	let formData = new FormData();

	formData.append("user", user);
	formData.append("command", inputComando);
	formData.append("token", btoa(token));

	let xhr = new XMLHttpRequest();
	xhr.open("POST", "api.php");
	xhr.send(formData);

	//xhr.onload = () => alert(xhr.response);
}