<div id="popupBoxOnePosition">
	<div class="popupBoxWrapper">
		<div class="popupBoxContent">
			<h3 style=" font-size: 30px;" class="alert alert-danger">
				<center><strong>Forgot password?.</strong></center>
			</h3>
			<p style="font-size: 15px; color: black; text-align: center">
				We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!
			</p>
			<form action="" role="form" method="POST">
				<div class="form-group">
					<input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" title="Please enter your Email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
				</div>

				<div class="form-group row">
					<div class="col">
						<button type="submit" class="btn btn-success" name="submit">Request</button>
					</div>

					<div class="col">

						<a onclick="toggle_visibility('popupBoxOnePosition');">
							<button type="cancel" class="btn btn-danger" name="cancel" data-toggle="modal">
								Cancel
							</button>
						</a>

					</div>

				</div>
			</form>



		</div>
	</div>
</div>


<script type="text/javascript">
	function toggle_visibility(id) {
		var e = document.getElementById(id);
		if (e.style.display == 'block')
			e.style.display = 'none';
		else
			e.style.display = 'block';
	}
</script>