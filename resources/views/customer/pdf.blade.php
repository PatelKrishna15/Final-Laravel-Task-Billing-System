
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>A simple, clean, and responsive HTML invoice template</title>

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		
		<h3>Because sometimes, all you need is something simple.</h3>
		Find the code on <a href="https://github.com/sparksuite/simple-html-invoice-template">GitHub</a>. Licensed under the
		<a href="http://opensource.org/licenses/MIT" target="_blank">MIT license</a>.<br /><br /><br />

		<div class="invoice-box">
			<table>
				<div class="container">
					
					<div class="card mt-2 p-3">
						<div class="row">
							<div class="col-12">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Customer Name</th>
											<th scope="col">Industry</th>
											<th scope="col">Contact Person</th>
											<th scope="col">Customer Image</th>
											<th scope="col">Phone</th>
											<th scope="col">Address</th>
											<th scope="col">Postal_code</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($customer as $item)
											<tr>
												<th scope="row">{{ $item->id }} </th>
												<td>{{ $item->customer_name }}</td>
												<td>{{ $item->industry }}</td>
												<td>{{ $item->contact_person }}</td>
												<td><img height="100" width="100" src="c_images/{{$item->customer_img}}"></td>
												<td>{{ $item->phone }}</td>
												<td>{{ $item->address }}</td>
												<td>{{ $item->postal_code }}</td>
												
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
			</table>
		</div>
	</body>
</html>
