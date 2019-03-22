
function togglePost(){
	document.getElementById('newPostLink').addEventListener('click',()=>{
		document.getElementById('newPostForm').classList.toggle('invisible')
	})
}

function toggleEditPost(){
	document.getElementById('editPostLink').addEventListener('click',()=>{
		document.getElementById('editPostForm').classList.toggle('invisible')
	})
}