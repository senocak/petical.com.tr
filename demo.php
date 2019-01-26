<script src='//assets.codepen.io/assets/editor/live/console_runner-ba402f0a8d1d2ce5a72889b81a71a979.js'></script> 
<style>    
.btn-close {
  color: #aaa;
  font-size: 30px;
  text-decoration: none;
  position: absolute;
  right: 5px;
  top: 0;
}
.btn-close:hover {
  color: #919191;
}

.modal:before {
  content: "";
  /*display: none;*/
  background: transparent;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: -1;
}
.modal:target:before {
  -webkit-transition: -webkit-transform 0.9s ease-out;
  -moz-transition: -moz-transform 0.9s ease-out;
  -o-transition: -o-transform 0.9s ease-out;
  transition: transform 0.9s ease-out;
  z-index: 10;
  background: rgba(0, 0, 0, 0.6);
  /*display: block;*/
}

.modal:target + .modal-dialog {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  top: 20%;
}

.modal-dialog {
  background: #fefefe;
  border: #333 solid 1px;
  border-radius: 5px;
  margin-left: -200px;
  position: fixed;
  left: 50%;
  top: -100%;
  z-index: 11;
  width: 360px;
  -webkit-transform: translate(0, -500%);
  -ms-transform: translate(0, -500%);
  transform: translate(0, -500%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -moz-transition: -moz-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
}

.modal-body {
  padding: 20px;
}

.modal-header,
.modal-footer {
  padding: 10px 20px;
}

.modal-header {
  border-bottom: #eee solid 1px;
}
.modal-header h2 {
  font-size: 20px;
}

.modal-footer {
  border-top: #eee solid 1px;
  text-align: right;
}
</style> 
<a href="#siparis" class="btn btn-big">Modal!</a>  
<a href="#" class="modal" id="siparis" aria-hidden="true"></a>
<div class="modal-dialog">
	<div class="modal-header"> Modal in CSS? <a href="#" class="btn-close" aria-hidden="true">×</a></div>
	<div class="modal-body"><p>One modal example here! :D</p></div>
	<div class="modal-footer"><a href="#" class="btn">Nice!</a></div>
</div>
