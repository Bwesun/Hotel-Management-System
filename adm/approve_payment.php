<div class="col-lg-9">
					<div class="card" style="padding: 5px;">
						<h4>Approve Payment</h4>
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-12 text-primary">
									<input type="text" id="search_text" class="form-control" placeholder="Enter Invoice Number">
									<div id="result" class="col-lg-12" style="overflow-y: scroll;"> </div>
								</div>
									
<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt= $(this).val();
            if(txt !=''){
                $.ajax({
                    url:"fetch.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            else
            {
                $('#result').html('');
            }
        });
    });

</script>

                				</div>
							</div>
					</div>