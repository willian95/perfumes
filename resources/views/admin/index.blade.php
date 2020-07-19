@extends('layouts.admin')

@section("content")

	{{--<div class="subheader py-5 py-lg-10 gutter-b subheader-transparent" id="kt_subheader" style="background-color: #663259; background-position: right bottom; background-size: auto 100%; background-repeat: no-repeat; background-image: url(assets/media/svg/patterns/taieri.svg)">
		<div class="container d-flex flex-column">
			<!--begin::Title-->
			<div class="d-flex align-items-sm-end flex-column flex-sm-row mb-5">
				<h2 class="text-white mr-5 mb-0">Search Job</h2>
				<span class="text-white opacity-60 font-weight-bold">Job Management System</span>
			</div>
			<!--end::Title-->
			<!--begin::Search Bar-->
			<div class="d-flex align-items-md-center mb-2 flex-column flex-md-row">
				<div class="bg-white rounded p-4 d-flex flex-grow-1 flex-sm-grow-0">
					<!--begin::Form-->
					<form class="form d-flex align-items-md-center flex-sm-row flex-column flex-grow-1 flex-sm-grow-0">
						<!--begin::Input-->
						<div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
										<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<input type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Job Title" />
						</div>
						<!--end::Input-->
						<!--begin::Input-->
						<span class="bullet bullet-ver h-25px d-none d-sm-flex mr-2"></span>
						<div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<input type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="kt_searchbar_7_category-options" data-offset="0,10" readonly="readonly" />
							<div id="kt_searchbar_7_category-options" class="dropdown-menu dropdown-menu-sm">
								<div class="dropdown-item cursor-pointer">HR Management</div>
								<div class="dropdown-item cursor-pointer">Developers</div>
								<div class="dropdown-item cursor-pointer">Creative</div>
								<div class="dropdown-divider"></div>
								<div class="dropdown-item cursor-pointer">Top Management</div>
							</div>
						</div>
						<!--end::Input-->
						<!--begin::Input-->
						<span class="bullet bullet-ver h-25px d-none d-sm-flex mr-2"></span>
						<div class="d-flex align-items-center py-3 py-sm-0 px-sm-3">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Rec.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M12,16 C14.209139,16 16,14.209139 16,12 C16,9.790861 14.209139,8 12,8 C9.790861,8 8,9.790861 8,12 C8,14.209139 9.790861,16 12,16 Z M12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 Z" fill="#000000" fill-rule="nonzero" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<input id="kt_subheader_7_location" type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Location" data-toggle="modal" aria-haspopup="true" aria-expanded="false" data-target="#subheader7Modal" readonly="readonly" />
						</div>
						<!--end::Input-->
						<button type="submit" class="btn btn-dark font-weight-bold btn-hover-light-primary mt-3 mt-sm-0 px-7">Search</button>
					</form>
					<!--end::Form-->
				</div>
				<!--begin::Advanced Search-->
				<div class="mt-4 my-md-0 mx-md-10">
					<a href="#" class="text-white font-weight-bolder text-hover-primary">Advanced Search</a>
				</div>
				<!--end::Advanced Search-->
			</div>
			<!--end::Search Bar-->
		</div>
	</div>--}}
	<!--end::Subheader-->
	<!--begin::Modal-->
	<div class="modal fade" id="subheader7Modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Select Location</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close"></i>
					</button>
				</div>
				<div class="modal-body">
					<div id="kt_subheader_leaflet" style="height:450px; width: 100%;"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
					<button id="submit" type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal">Apply</button>
				</div>
			</div>
		</div>
	</div>
	<!--end::Modal-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<!--begin::Row-->
			<div class="row">
				<div class="col-xl-4">
					<!--begin::Tiles Widget 8-->
					<div class="card card-custom gutter-b card-stretch">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<div class="card-title">
								<div class="card-label">
									<div class="font-weight-bolder">Estadísticas</div>
								</div>
							</div>
							{{--<div class="card-toolbar">
								<div class="dropdown dropdown-inline">
									<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-hor"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover py-5">
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-drop"></i>
													</span>
													<span class="navi-text">New Group</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-list-3"></i>
													</span>
													<span class="navi-text">Contacts</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-rocket-1"></i>
													</span>
													<span class="navi-text">Groups</span>
													<span class="navi-link-badge">
														<span class="label label-light-primary label-inline font-weight-bold">new</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Calls</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-gear"></i>
													</span>
													<span class="navi-text">Settings</span>
												</a>
											</li>
											<li class="navi-separator my-3"></li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-magnifier-tool"></i>
													</span>
													<span class="navi-text">Help</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Privacy</span>
													<span class="navi-link-badge">
														<span class="label label-light-danger label-rounded font-weight-bold">5</span>
													</span>
												</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
							</div>--}}
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body d-flex flex-column p-0">
							<!--begin::Items-->
							<div class="flex-grow-1 card-spacer">
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-40 symbol-light-primary mr-3 flex-shrink-0">
											<div class="symbol-label">
												<span class="svg-icon svg-icon-lg svg-icon-primary">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
															<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Categorías</a>
											
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">{{ App\Category::count() }}</div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-40 symbol-light-warning mr-3 flex-shrink-0">
											<div class="symbol-label">
												<span class="svg-icon svg-icon-lg svg-icon-warning">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Mic.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M12.9975507,17.929461 C12.9991745,17.9527631 13,17.9762852 13,18 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,18 C11,17.9762852 11.0008255,17.9527631 11.0024493,17.929461 C7.60896116,17.4452857 5,14.5273206 5,11 L7,11 C7,13.7614237 9.23857625,16 12,16 C14.7614237,16 17,13.7614237 17,11 L19,11 C19,14.5273206 16.3910388,17.4452857 12.9975507,17.929461 Z" fill="#000000" fill-rule="nonzero" />
															<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-360.000000) translate(-12.000000, -8.000000)" x="9" y="2" width="6" height="12" rx="3" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Marcas</a>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">{{ App\Brand::count() }}</div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-40 symbol-light-success mr-3 flex-shrink-0">
											<div class="symbol-label">
												<span class="svg-icon svg-icon-lg svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
															<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Productos</a>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">{{ App\Product::count() }}</div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-40 symbol-light-success mr-3 flex-shrink-0">
											<div class="symbol-label">
												<span class="svg-icon svg-icon-lg svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
															<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Clientes registrados</a>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">{{ App\User::where("role_id", 2)->count() }}</div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-40 symbol-light-success mr-3 flex-shrink-0">
											<div class="symbol-label">
												<span class="svg-icon svg-icon-lg svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
															<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Clientes Invitados</a>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">{{ App\GuestUser::count() }}</div>
								</div>
								<!--end::Item-->
							</div>
							<!--end::Items-->
							<!--begin::Chart-->
							{{--<div id="kt_tiles_widget_8_chart" class="card-rounded-bottom" data-color="warning" style="height: 150px"></div>--}}
							<!--end::Chart-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tiles Widget 8-->
				</div>
				<div class="col-xl-8">
					<!--begin::Advance Table Widget 10-->
					<div class="card card-custom gutter-b card-stretch">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Ventas</span>
							</h3>
							<!--<div class="card-toolbar">
								<a href="#" class="btn btn-info font-weight-bolder font-size-sm">New Report</a>
							</div>-->
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
									<thead>
										<tr class="text-left">
											<!--<th class="pl-0" style="width: 30px">
												<label class="checkbox checkbox-lg checkbox-single mr-2">
													<input type="checkbox" value="1" />
													<span></span>
												</label>
											</th>-->
											<th class="pl-0" style="min-width: 120px">#</th>
											<th style="min-width: 110px">Cliente</th>
											<th style="min-width: 110px">
												<span class="text-info">Fecha</span>
											</th>
											<th style="min-width: 120px">Total</th>
											<th style="min-width: 120px">Tracking</th>
										</tr>
									</thead>
									<tbody>
										@foreach(App\Payment::with("user", "guest")->where("status", "aprobado")->orderBy('id', 'desc')->take(5)->get() as $payment)
											<tr>
												<td class="pl-0">
													<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $payment->order_id }}</a>
												</td>
												@if($payment->user)
													<td>
														<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $payment->user->name }}</span>
													</td>
												@endif

												@if($payment->guest)
													<td>
														<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $payment->guest->name }}</span>
													</td>
												@endif
												
												<td>
													<span class="text-info font-weight-bolder d-block font-size-lg">{{ $payment->created_at->format('d-m-Y') }}</span>
												</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">$ {{ number_format($payment->total, 0, ",", ".") }}</span>
												</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><a href="{{ $payment->tracking_url }}" target="_blank">{{ $payment->tracking }}</a></span>
												</td>
												
											</tr>
										@endforeach
					
						
									</tbody>
								</table>
							</div>
							<!--end::Table-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 10-->
				</div>
			</div>
			<!--end::Row-->
			<div class="row">
				{{--<div class="col-xl-4">
					<!--begin::List Widget 16-->
					<div class="card card-custom gutter-b card-stretch">
						<!--begin::Header-->
						<div class="card-header border-0">
							<h3 class="card-title font-weight-bolder text-dark">Properties</h3>
							<div class="card-toolbar">
								<div class="dropdown dropdown-inline">
									<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-ver"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover py-5">
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-drop"></i>
													</span>
													<span class="navi-text">New Group</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-list-3"></i>
													</span>
													<span class="navi-text">Contacts</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-rocket-1"></i>
													</span>
													<span class="navi-text">Groups</span>
													<span class="navi-link-badge">
														<span class="label label-light-primary label-inline font-weight-bold">new</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Calls</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-gear"></i>
													</span>
													<span class="navi-text">Settings</span>
												</a>
											</li>
											<li class="navi-separator my-3"></li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-magnifier-tool"></i>
													</span>
													<span class="navi-text">Help</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Privacy</span>
													<span class="navi-link-badge">
														<span class="label label-light-danger label-rounded font-weight-bold">5</span>
													</span>
												</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
							</div>
						</div>
						<!--end:Header-->
						<!--begin::Body-->
						<div class="card-body pt-2">
							<!--begin::Item-->
							<div class="d-flex flex-wrap align-items-center pb-10">
								<!--begin::Symbol-->
								<div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
									<div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-17.jpg')"></div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
									<a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">BlueSky Apartments</a>
									<span class="text-muted font-weight-bold">2 bed, 1 bath, 1 carpark</span>
								</div>
								<!--end::Title-->
								<!--begin::Btn-->
								<a href="#" class="btn btn-icon btn-light btn-sm">
									<span class="svg-icon svg-icon-success">
										<span class="svg-icon svg-icon-md">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
								</a>
								<!--end::Btn-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="d-flex flex-wrap align-items-center pb-10">
								<!--begin::Symbol-->
								<div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
									<div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-1.jpg')"></div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
									<a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">Yellow Apartments</a>
									<span class="text-muted font-weight-bold">2 bed, 2 bath, 1 carpark</span>
								</div>
								<!--end::Title-->
								<!--begin::Btn-->
								<a href="#" class="btn btn-icon btn-light btn-sm">
									<span class="svg-icon svg-icon-success">
										<span class="svg-icon svg-icon-md">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
								</a>
								<!--end::Btn-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="d-flex flex-wrap align-items-center pb-10">
								<!--begin::Symbol-->
								<div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
									<div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-22.jpg')"></div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
									<a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">421 Avenue</a>
									<span class="text-muted font-weight-bold">3 bed, 1 bath, 1 carpark</span>
								</div>
								<!--end::Title-->
								<!--begin::Btn-->
								<a href="#" class="btn btn-icon btn-light btn-sm">
									<span class="svg-icon svg-icon-success">
										<span class="svg-icon svg-icon-md">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
								</a>
								<!--end::Btn-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="d-flex flex-wrap align-items-center pb-10">
								<!--begin::Symbol-->
								<div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
									<div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-9.jpg')"></div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
									<a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">Glassbricks</a>
									<span class="text-muted font-weight-bold">2 bed, 2 bath, 1 carpark</span>
								</div>
								<!--end::Title-->
								<!--begin::Btn-->
								<a href="#" class="btn btn-icon btn-light btn-sm">
									<span class="svg-icon svg-icon-success">
										<span class="svg-icon svg-icon-md">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
								</a>
								<!--end::Btn-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="d-flex flex-wrap align-items-center">
								<!--begin::Symbol-->
								<div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
									<div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-11.jpg')"></div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
									<a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">RollerCoaster</a>
									<span class="text-muted font-weight-bold">4 bed, 3 bath, 1 carpark</span>
								</div>
								<!--end::Title-->
								<!--begin::Btn-->
								<a href="#" class="btn btn-icon btn-light btn-sm">
									<span class="svg-icon svg-icon-success">
										<span class="svg-icon svg-icon-md">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
								</a>
								<!--end::Btn-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::List Widget 13-->
				</div>--}}
				<div class="col-xl-8">
					<!--begin::Mixed Widget 5-->
					<div class="card card-custom bg-radial-gradient-primary gutter-b card-stretch">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title font-weight-bolder text-white">Ventas</h3>
							{{--<div class="card-toolbar">
								<div class="dropdown dropdown-inline">
									<a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-hor"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover">
											<li class="navi-header font-weight-bold py-4">
												<span class="font-size-lg">Choose Label:</span>
												<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
											</li>
											<li class="navi-separator mb-3 opacity-70"></li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-text">
														<span class="label label-xl label-inline label-light-success">Customer</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-text">
														<span class="label label-xl label-inline label-light-danger">Partner</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-text">
														<span class="label label-xl label-inline label-light-warning">Suplier</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-text">
														<span class="label label-xl label-inline label-light-primary">Member</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-text">
														<span class="label label-xl label-inline label-light-dark">Staff</span>
													</span>
												</a>
											</li>
											<li class="navi-separator mt-3 opacity-70"></li>
											<li class="navi-footer py-4">
												<a class="btn btn-clean font-weight-bold btn-sm" href="#">
												<i class="ki ki-plus icon-sm"></i>Add new</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
							</div>--}}
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body d-flex flex-column p-0">
							<!--begin::Chart-->
							<div id="kt_mixed_widget_5_chart" style="height: 200px"></div>
							<!--end::Chart-->
							<!--begin::Stats-->
							<div class="card-spacer bg-white card-rounded flex-grow-1">
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col px-8 py-6 mr-8">
										<div class="font-size-sm text-muted font-weight-bold">Total en productos</div>
										<div class="font-size-h4 font-weight-bolder">$ {{ number_format(App\Payment::where("status", "aprobado")->sum('total_products'), 0, ",", ".") }}</div>
									</div>
									<div class="col px-8 py-6">
										<div class="font-size-sm text-muted font-weight-bold">Total en costos de envío</div>
										<div class="font-size-h4 font-weight-bolder">$ {{ number_format(App\Payment::where("status", "aprobado")->sum('shipping_cost'), 0, ",", ".") }}</div>
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col px-8 py-6 mr-8">
										<div class="font-size-sm text-muted font-weight-bold">Ingresos Totales</div>
										<div class="font-size-h4 font-weight-bolder">$ {{ number_format(App\Payment::where("status", "aprobado")->sum('total'), 0, ",", ".") }}</div>
									</div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Stats-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 5-->
				</div>
				{{--<div class="col-xl-4">
					<!--begin::Tiles Widget 15-->
					<div class="card card-custom gutter-b card-stretch">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<div class="card-title">
								<div class="card-label">
									<div class="font-weight-bolder">Weekly Sales Stats</div>
									<div class="font-size-sm text-muted mt-2">890,344 Sales</div>
								</div>
							</div>
							<div class="card-toolbar">
								<div class="dropdown dropdown-inline">
									<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-hor"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover py-5">
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-drop"></i>
													</span>
													<span class="navi-text">New Group</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-list-3"></i>
													</span>
													<span class="navi-text">Contacts</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-rocket-1"></i>
													</span>
													<span class="navi-text">Groups</span>
													<span class="navi-link-badge">
														<span class="label label-light-primary label-inline font-weight-bold">new</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Calls</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-gear"></i>
													</span>
													<span class="navi-text">Settings</span>
												</a>
											</li>
											<li class="navi-separator my-3"></li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-magnifier-tool"></i>
													</span>
													<span class="navi-text">Help</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Privacy</span>
													<span class="navi-link-badge">
														<span class="label label-light-danger label-rounded font-weight-bold">5</span>
													</span>
												</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body d-flex flex-column">
							<!--begin::Items-->
							<div class="flex-grow-1">
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
											<div class="symbol-label">
												<img src="{{ asset('admin/assets/media/svg/misc/006-plurk.svg') }}" alt="" class="h-50" />
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Authors</a>
											<div class="font-size-sm text-muted font-weight-bold mt-1">Ricky Hunt, Sandra Trepp</div>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+105$</div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
											<div class="symbol-label">
												<img src="{{ asset('admin/assets/media/svg/misc/015-telegram.svg') }}" alt="" class="h-50" />
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Sales</a>
											<div class="font-size-sm text-muted font-weight-bold mt-1">PitStop Emails</div>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+60$</div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between mb-10">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
											<div class="symbol-label">
												<img src="{{ asset('admin/assets/media/svg/misc/003-puzzle.svg') }}" alt="" class="h-50" />
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Bestsellers</a>
											<div class="font-size-sm text-muted font-weight-bold mt-1">Pitstop Email Marketing</div>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+75$</div>
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center mr-2">
										<div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
											<div class="symbol-label">
												<img src="{{ asset('admin/assets/media/svg/misc/009-hot-air-balloon.svg') }}" alt="" class="h-50" />
											</div>
										</div>
										<div>
											<a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top Engagement</a>
											<div class="font-size-sm text-muted font-weight-bold mt-1">KT.com solutions</div>
										</div>
									</div>
									<div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">+75$</div>
								</div>
								<!--end::Item-->
							</div>
							<!--end::Items-->
							<!--begin::Action-->
							<div class="pt-10 pb-5 text-center">
								<a href='#' class="btn btn-primary font-weight-bold px-5 py-3">Create Report</a>
							</div>
							<!--end::Action-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Tiles Widget 15-->
				</div>--}}
			</div>
			<!--end::Row-->
			{{--<div class="row">
				<div class="col-xl-4">
					<!--begin::Mixed Widget 10-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column">
							<div class="flex-grow-1 pb-5">
								<!--begin::Info-->
								<div class="d-flex align-items-center pr-2 mb-6">
									<span class="text-muted font-weight-bold font-size-lg flex-grow-1">7 Hours Ago</span>
									<div class="symbol symbol-50">
										<span class="symbol-label bg-light-light">
											<img src="{{ asset('admin/assets/media/svg/misc/006-plurk.svg') }}" class="h-50 align-self-center" alt="" />
										</span>
									</div>
								</div>
								<!--end::Info-->
								<!--begin::Link-->
								<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h4">PitStop - Multiple Email
								<br />Generator</a>
								<!--end::Link-->
								<!--begin::Desc-->
								<p class="text-dark-50 font-weight-normal font-size-lg mt-6">Pitstop creates quick email campaigns.
								<br />We help to strengthen your brand
								<br />for your every purpose.</p>
								<!--end::Desc-->
							</div>
							<!--begin::Team-->
							<div class="d-flex align-items-center">
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light mr-3">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/001-boy.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light mr-3">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/028-girl-16.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/024-boy-9.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
							</div>
							<!--end::Team-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 10-->
				</div>
				<div class="col-xl-4">
					<!--begin::Mixed Widget 11-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column">
							<div class="flex-grow-1 pb-5">
								<!--begin::Info-->
								<div class="d-flex align-items-center pr-2 mb-6">
									<span class="text-muted font-weight-bold font-size-lg flex-grow-1">2 Days Ago</span>
									<div class="symbol symbol-50">
										<span class="symbol-label bg-light-light">
											<img src="{{ asset('admin/assets/media/svg/misc/015-telegram.svg') }}" class="h-50 align-self-center" alt="" />
										</span>
									</div>
								</div>
								<!--end::Info-->
								<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h4">Craft - ReactJS Admin
								<br />Theme</a>
								<!--begin::Desc-->
								<p class="text-dark-50 font-weight-normal font-size-lg mt-6">Craft uses the latest and greatest frameworks
								<br />with ReactJS for complete modernization and
								<br />future proofing your business operations
								<br />and sales opportunities</p>
								<!--end::Desc-->
							</div>
							<!--begin::Team-->
							<div class="d-flex align-items-center">
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light mr-3">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/001-boy.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light mr-3">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/028-girl-16.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
								<!--begin: Pic-->
								<a href="#" class="symbol symbol-45 symbol-light mr-3">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/024-boy-9.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/005-girl-2.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
							</div>
							<!--end::Team-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 11-->
				</div>
				<div class="col-xl-4">
					<!--begin::Mixed Widget 12-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column">
							<div class="flex-grow-1 pb-5">
								<!--begin::Info-->
								<div class="d-flex align-items-center pr-2 mb-6">
									<span class="text-muted font-weight-bold font-size-lg flex-grow-1">5 Weeks Ago</span>
									<div class="symbol symbol-50">
										<span class="symbol-label bg-light-light">
											<img src="{{ asset('admin/assets/media/svg/misc/003-puzzle.svg') }}" class="h-50 align-self-center" alt="" />
										</span>
									</div>
								</div>
								<!--end::Info-->
								<a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-h4">KT.com - High Quality
								<br />Templates</a>
								<!--begin::Desc-->
								<p class="text-dark-50 font-weight-normal font-size-lg mt-6">Easy to use, incredibly flexible and secure
								<br />with in-depth documentation that outlines
								<br />everything for you</p>
								<!--end::Desc-->
							</div>
							<!--begin::Team-->
							<div class="d-flex align-items-center">
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light mr-3">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/001-boy.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light mr-3">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/028-girl-16.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
								<!--begin::Pic-->
								<a href="#" class="symbol symbol-45 symbol-light">
									<div class="symbol-label">
										<img src="{{ asset('admin/assets/media/svg/avatars/024-boy-9.svg') }}" class="h-75 align-self-end" alt="" />
									</div>
								</a>
								<!--end::Pic-->
							</div>
							<!--end::Team-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 12-->
				</div>
			</div>
			<!--end::Row-->
			<!--begin::Row-->
			<div class="row">
				<div class="col-lg-4">
					<!--begin::List Widget 8-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0">
							<h3 class="card-title font-weight-bolder text-dark">Trends</h3>
							<div class="card-toolbar">
								<div class="dropdown dropdown-inline">
									<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-ver"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover">
											<li class="navi-header pb-1">
												<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-shopping-cart-1"></i>
													</span>
													<span class="navi-text">Order</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-calendar-8"></i>
													</span>
													<span class="navi-text">Event</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-graph-1"></i>
													</span>
													<span class="navi-text">Report</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-rocket-1"></i>
													</span>
													<span class="navi-text">Post</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-writing"></i>
													</span>
													<span class="navi-text">File</span>
												</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0">
							<!--begin::Item-->
							<div class="mb-10">
								<!--begin::Section-->
								<div class="d-flex align-items-center">
									<!--begin::Symbol-->
									<div class="symbol symbol-45 symbol-light mr-5">
										<span class="symbol-label">
											<img src="{{ asset('admin/assets/media/svg/misc/006-plurk.svg') }}" class="h-50 align-self-center" alt="" />
										</span>
									</div>
									<!--end::Symbol-->
									<!--begin::Text-->
									<div class="d-flex flex-column flex-grow-1">
										<a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Top Authors</a>
										<span class="text-muted font-weight-bold">5 day ago</span>
									</div>
									<!--end::Text-->
								</div>
								<!--end::Section-->
								<!--begin::Desc-->
								<p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the top Authors that fits within this section</p>
								<!--end::Desc-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="mb-10">
								<!--begin::Section-->
								<div class="d-flex align-items-center">
									<!--begin::Symbol-->
									<div class="symbol symbol-45 symbol-light mr-5">
										<span class="symbol-label">
											<img src="{{ asset('admin/assets/media/svg/misc/015-telegram.svg') }}" class="h-50 align-self-center" alt="" />
										</span>
									</div>
									<!--end::Symbol-->
									<!--begin::Text-->
									<div class="d-flex flex-column flex-grow-1">
										<a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Popular Authors</a>
										<span class="text-muted font-weight-bold">5 day ago</span>
									</div>
									<!--end::Text-->
								</div>
								<!--end::Section-->
								<!--begin::Desc-->
								<p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the Popular Authors that fits within this section</p>
								<!--end::Desc-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="">
								<!--begin::Section-->
								<div class="d-flex align-items-center">
									<!--begin::Symbol-->
									<div class="symbol symbol-45 symbol-light mr-5">
										<span class="symbol-label">
											<img src="{{ asset('admin/assets/media/svg/misc/014-kickstarter.svg') }}" class="h-50 align-self-center" alt="" />
										</span>
									</div>
									<!--end::Symbol-->
									<!--begin::Text-->
									<div class="d-flex flex-column flex-grow-1">
										<a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">New Users</a>
										<span class="text-muted font-weight-bold">5 day ago</span>
									</div>
									<!--end::Text-->
								</div>
								<!--end::Section-->
								<!--begin::Desc-->
								<p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the New Users that fits within this section</p>
								<!--end::Desc-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Body-->
					</div>
					<!--end: Card-->
					<!--end::List Widget 8-->
				</div>
				<div class="col-lg-8">
					<!--begin::Base Table Widget 2-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">New Arrivals</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
							</h3>
							<div class="card-toolbar">
								<ul class="nav nav-pills nav-pills-sm nav-dark-75">
									<li class="nav-item">
										<a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_2_1">Month</a>
									</li>
									<li class="nav-item">
										<a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_2_2">Week</a>
									</li>
									<li class="nav-item">
										<a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_2_3">Day</a>
									</li>
								</ul>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table table-borderless table-vertical-center">
									<thead>
										<tr>
											<th class="p-0" style="width: 50px"></th>
											<th class="p-0" style="min-width: 150px"></th>
											<th class="p-0" style="min-width: 140px"></th>
											<th class="p-0" style="min-width: 120px"></th>
											<th class="p-0" style="min-width: 40px"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="pl-0 py-5">
												<div class="symbol symbol-50 symbol-light mr-2">
													<span class="symbol-label">
														<img src="{{ asset('admin/assets/media/svg/misc/006-plurk.svg') }}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td class="pl-0">
												<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top Authors</a>
												<span class="text-muted font-weight-bold d-block">Successful Fellas</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">ReactJs, HTML</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">4600 Users</span>
											</td>
											<td class="text-right pr-0">
												<a href="#" class="btn btn-icon btn-light btn-sm">
													<span class="svg-icon svg-icon-md svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</a>
											</td>
										</tr>
										<tr>
											<td class="pl-0 py-5">
												<div class="symbol symbol-50 symbol-light mr-2">
													<span class="symbol-label">
														<img src="{{ asset('admin/assets/media/svg/misc/015-telegram.svg') }}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td class="pl-0">
												<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular Authors</a>
												<span class="text-muted font-weight-bold d-block">Most Successful</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">Python, MySQL</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">7200 Users</span>
											</td>
											<td class="text-right pr-0">
												<a href="#" class="btn btn-icon btn-light btn-sm">
													<span class="svg-icon svg-icon-md svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</a>
											</td>
										</tr>
										<tr>
											<td class="pl-0 py-5">
												<div class="symbol symbol-50 symbol-light mr-2">
													<span class="symbol-label">
														<img src="{{ asset('admin/assets/media/svg/misc/003-puzzle.svg') }}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td class="pl-0">
												<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New Users</a>
												<span class="text-muted font-weight-bold d-block">Awesome Users</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">Laravel, Metronic</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">890 Users</span>
											</td>
											<td class="text-right pr-0">
												<a href="#" class="btn btn-icon btn-light btn-sm">
													<span class="svg-icon svg-icon-md svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</a>
											</td>
										</tr>
										<tr>
											<td class="pl-0 py-5">
												<div class="symbol symbol-50 symbol-light mr-2">
													<span class="symbol-label">
														<img src="{{ asset('admin/assets/media/svg/misc/005-bebo.svg') }}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td class="pl-0">
												<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active Customers</a>
												<span class="text-muted font-weight-bold d-block">Best Customers</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">AngularJS, C#</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">6370 Users</span>
											</td>
											<td class="text-right pr-0">
												<a href="#" class="btn btn-icon btn-light btn-sm">
													<span class="svg-icon svg-icon-md svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</a>
											</td>
										</tr>
										<tr>
											<td class="pl-0 py-5">
												<div class="symbol symbol-50 symbol-light mr-2">
													<span class="symbol-label">
														<img src="{{ asset('admin/assets/media/svg/misc/014-kickstarter.svg') }}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td class="pl-0">
												<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller Theme</a>
												<span class="text-muted font-weight-bold d-block">Amazing Templates</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">ReactJS, Ruby</span>
											</td>
											<td class="text-right">
												<span class="text-muted font-weight-bold">354 Users</span>
											</td>
											<td class="text-right pr-0">
												<a href="#" class="btn btn-icon btn-light btn-sm">
													<span class="svg-icon svg-icon-md svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!--end::Table-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Base Table Widget 2-->
				</div>
			</div>--}}
			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>

@endsection