@extends('layouts.app')
@section('content')
    <div class="row w-100 v-body">
        <div class="col-lg-8 col-md-12 border-end p-0">
            <div class="row w-100 border-top sticky-top text-bg-light border-bottom mx-1 mb-3">
                <div class="col-6 text-center border-end p-2">
                    <h5>For You</h5>
                </div>
                <div class="col-6 text-center p-2">
                    <h5>Following</h5>
                </div>
            </div>
            <div class="info-list">
                <ul class="list-group">
                    <li class="list-group-item">
                        <article href="/qiongliwu/posts/27294">
                            {{-- head --}}
                            <div class="d-inline-flex" style="width:100%">
                                <a href="#">
                                    <div class="info_author_photo pl-2 pt-2">
                                        <img src="./img/459510ae-8588-4e0b-8a23-01da7aa31d1f.jpg" alt="..."
                                            style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                                    </div>
                                </a>
                                <div class="flex-fill pt-2">
                                    <div class="d-flex">
                                        <div class="d-flex info_author">
                                            <div>
                                                <div class="d-flex">
                                                    <a href="#"class="text-a">
                                                        <div style="line-height:100%">
                                                            <span class="v-text-s">Ms. Qiongli Wu</span>
                                                        </div>
                                                    </a>
                                                    <div class="pl-2 text-m">
                                                        <span class="text-to">@qiongliwu</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pl-2">
                                                <p class="text-muted">26 minutes ago</p>
                                            </div>
                                        </div>
                                        {{-- dropdown --}}
                                        <div class=" el-action-s  pl-2 pr-2 rounded-circle ml-auto">
                                            <div class="dropleft" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="more">
                                                <span data-toggle="dropdown" aria-expanded="false">
                                                    <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                                                        style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                                        <g>
                                                            <circle cx="5" cy="12" r="2"></circle>
                                                            <circle cx="12" cy="12" r="2"></circle>
                                                            <circle cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg></span>

                                                <div class="dropdown-menu p-3">
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Unfollow@qiongliwu</span></div>
                                                    </div>
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Block @qiongliwu</span></div>
                                                    </div>
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="/svg/report.svg" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Report post</span></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- description --}}
                                    <div class="info-intro">
                                        <span class="text-success">#sell</span>
                                        SupBro new hot selling productsSports shoes waterproof
                                        protection cleaner,Place of Origin:Guangdong, China Cases of
                                        gauge:24 bottles Brand Name:SupBro Product features:waterproof
                                        Product specification:150ml,300ml Model Number:Nano...
                                    </div>
                                    {{-- image --}}

                                    <div class="row w-100">
                                        <div class="col-6 p-0">
                                            <img src="./img/1b4c349b-0d3c-4611-8cd1-f810d735bbad.jpg" alt=""
                                                style="width: 100%; height: auto;">
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="./img/1b4c349b-0d3c-4611-8cd1-f810d735bbad.jpg" alt=""
                                                style="width: 100%; height: auto;">
                                        </div>
                                    </div>
                                    {{-- footer --}}
                                    <div class="d-flex justify-content-between p-3">
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/comment.svg" alt=""
                                                    style="width: 23px; height: 23px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/repost.svg" alt=""
                                                    style="width: 30px; height: 30px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/like.svg" alt="" style="width: 23px; height: 23px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-row gap-2">
                                            <a href="">
                                                <img src="/svg/bookmark.svg" alt=""
                                                    style="width: 23px; height: 23px;">
                                            </a>
                                            <a href="">
                                                <img src="/svg/share.svg" alt="" style="width: 23px; height: 23px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                    <li class="list-group-item">
                        <article href="/qiongliwu/posts/27294">
                            {{-- head --}}
                            <div class="d-inline-flex" style="width:100%">
                                <a href="#">
                                    <div class="info_author_photo pl-2 pt-2">
                                        <img src="./img/459510ae-8588-4e0b-8a23-01da7aa31d1f.jpg" alt="..."
                                            style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                                    </div>
                                </a>
                                <div class="flex-fill pt-2">
                                    <div class="d-flex">
                                        <div class="d-flex info_author">
                                            <div>
                                                <div class="d-flex">
                                                    <a href="#"class="text-a">
                                                        <div style="line-height:100%">
                                                            <span class="v-text-s">Ms. Qiongli Wu</span>
                                                        </div>
                                                    </a>
                                                    <div class="pl-2 text-m">
                                                        <span class="text-to">@qiongliwu</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pl-2">
                                                <p class="text-muted">26 minutes ago</p>
                                            </div>
                                        </div>
                                        {{-- dropdown --}}
                                        <div class=" el-action-s  pl-2 pr-2 rounded-circle ml-auto">
                                            <div class="dropleft" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="more">
                                                <span data-toggle="dropdown" aria-expanded="false">
                                                    <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                                                        style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                                        <g>
                                                            <circle cx="5" cy="12" r="2"></circle>
                                                            <circle cx="12" cy="12" r="2"></circle>
                                                            <circle cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg></span>

                                                <div class="dropdown-menu p-3">
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Unfollow@qiongliwu</span></div>
                                                    </div>
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Block @qiongliwu</span></div>
                                                    </div>
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="/svg/report.svg" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Report post</span></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- description --}}
                                    <div class="info-intro">
                                        <span class="text-success">#sell</span>
                                        SupBro new hot selling productsSports shoes waterproof
                                        protection cleaner,Place of Origin:Guangdong, China Cases of
                                        gauge:24 bottles Brand Name:SupBro Product features:waterproof
                                        Product specification:150ml,300ml Model Number:Nano...
                                    </div>
                                    {{-- image --}}

                                    <div class="row w-100">
                                        <div class="col-6 p-0">
                                            <img src="./img/1b4c349b-0d3c-4611-8cd1-f810d735bbad.jpg" alt=""
                                                style="width: 100%; height: auto;">
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="./img/1b4c349b-0d3c-4611-8cd1-f810d735bbad.jpg" alt=""
                                                style="width: 100%; height: auto;">
                                        </div>
                                    </div>
                                    {{-- footer --}}
                                    <div class="d-flex justify-content-between p-3">
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/comment.svg" alt=""
                                                    style="width: 23px; height: 23px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/repost.svg" alt=""
                                                    style="width: 30px; height: 30px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/like.svg" alt="" style="width: 23px; height: 23px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-row gap-2">
                                            <a href="">
                                                <img src="/svg/bookmark.svg" alt=""
                                                    style="width: 23px; height: 23px;">
                                            </a>
                                            <a href="">
                                                <img src="/svg/share.svg" alt="" style="width: 23px; height: 23px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                    <li class="list-group-item">
                        <article href="/qiongliwu/posts/27294">
                            {{-- head --}}
                            <div class="d-inline-flex" style="width:100%">
                                <a href="#">
                                    <div class="info_author_photo pl-2 pt-2">
                                        <img src="./img/459510ae-8588-4e0b-8a23-01da7aa31d1f.jpg" alt="..."
                                            style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                                    </div>
                                </a>
                                <div class="flex-fill pt-2">
                                    <div class="d-flex">
                                        <div class="d-flex info_author">
                                            <div>
                                                <div class="d-flex">
                                                    <a href="#"class="text-a">
                                                        <div style="line-height:100%">
                                                            <span class="v-text-s">Ms. Qiongli Wu</span>
                                                        </div>
                                                    </a>
                                                    <div class="pl-2 text-m">
                                                        <span class="text-to">@qiongliwu</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pl-2">
                                                <p class="text-muted">26 minutes ago</p>
                                            </div>
                                        </div>
                                        {{-- dropdown --}}
                                        <div class=" el-action-s  pl-2 pr-2 rounded-circle ml-auto">
                                            <div class="dropleft" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="more">
                                                <span data-toggle="dropdown" aria-expanded="false">
                                                    <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                                                        style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                                        <g>
                                                            <circle cx="5" cy="12" r="2"></circle>
                                                            <circle cx="12" cy="12" r="2"></circle>
                                                            <circle cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg></span>

                                                <div class="dropdown-menu p-3">
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Unfollow@qiongliwu</span></div>
                                                    </div>
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Block @qiongliwu</span></div>
                                                    </div>
                                                    <div class="d-flex div-info-more-item dropdown-item">
                                                        <div>
                                                            <img src="/svg/report.svg" alt="">
                                                        </div>
                                                        <div class="ml-2"><span>Report post</span></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- description --}}
                                    <div class="info-intro">
                                        <span class="text-success">#sell</span>
                                        SupBro new hot selling productsSports shoes waterproof
                                        protection cleaner,Place of Origin:Guangdong, China Cases of
                                        gauge:24 bottles Brand Name:SupBro Product features:waterproof
                                        Product specification:150ml,300ml Model Number:Nano...
                                    </div>
                                    {{-- image --}}

                                    <div class="row w-100">
                                        <div class="col-6 p-0">
                                            <img src="./img/1b4c349b-0d3c-4611-8cd1-f810d735bbad.jpg" alt=""
                                                style="width: 100%; height: auto;">
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="./img/1b4c349b-0d3c-4611-8cd1-f810d735bbad.jpg" alt=""
                                                style="width: 100%; height: auto;">
                                        </div>
                                    </div>
                                    {{-- footer --}}
                                    <div class="d-flex justify-content-between p-3">
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/comment.svg" alt=""
                                                    style="width: 23px; height: 23px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/repost.svg" alt=""
                                                    style="width: 30px; height: 30px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href=""
                                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
                                                <img src="/svg/like.svg" alt="" style="width: 23px; height: 23px;">
                                                <span>4</span>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-row gap-2">
                                            <a href="">
                                                <img src="/svg/bookmark.svg" alt=""
                                                    style="width: 23px; height: 23px;">
                                            </a>
                                            <a href="">
                                                <img src="/svg/share.svg" alt="" style="width: 23px; height: 23px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 mb-4 pr-0 mt-2">
            <div class="sticky-top" style="top:-470px;z-index: 999;">
                <div>
                    <form class="search">
                        <div class="input-group mb-3 w-100 rounded-pill">
                            <span class="input-group-text border-right-0" id="basic-addon1"><img class="search-icon"
                                    src="/svg/search.svg" alt="" style="width: 23px; height: 23px;"></span>
                            <input type="text" class="form-control shadow-none bg-gray-100" placeholder="Search"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </form>
                </div>
                <div class="bg-gray-100 p-3 rounded-4">
                    <h3>Subscribe to Premium</h3>
                    <p> Subscribe to unlock new features and, if eligible, receive a share of ads revenue.</p>
                    <button class="btn btn-dark rounded-pill font-weight-bold">Subscribe</button>
                </div>
                {{-- tag --}}
                <div class="card border-0 rounded-4 mb-3 mt-3">
                    <div class="card-header   border-0 " style="font-size:1.25rem;font-weight: 700;">Popular tags</div>
                    <div class="card-body p-2 border-0" style="background-color:#f8f9fc">
                        <div class="d-flex align-items-center p-2 tagdiv">
                            <div>
                                <div class="text-ms"><span class="strong"> 479</span>&nbsp;followers
                                </div>
                                <div class="v-text">
                                    <a href="https://merchantface.com/tags/office-desk" class="text-a">#Office Desk</a>
                                </div>
                                <div class="d-flex">
                                    <div class="text-ms"><span>296</span>&nbsp;posts</div>
                                    <div class="text-ms ml-3"><span>121</span>&nbsp;pepoles</div>
                                </div>

                            </div>
                            <div class="ml-auto">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                                    style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                    <g>
                                        <circle cx="5" cy="12" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-2 tagdiv">
                            <div>
                                <div class="text-ms"><span class="strong"> 479</span>&nbsp;followers
                                </div>
                                <div class="v-text">
                                    <a href="https://merchantface.com/tags/office-desk" class="text-a">#Office Desk</a>
                                </div>
                                <div class="d-flex">
                                    <div class="text-ms"><span>296</span>&nbsp;posts</div>
                                    <div class="text-ms ml-3"><span>121</span>&nbsp;pepoles</div>
                                </div>

                            </div>
                            <div class="ml-auto">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                                    style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                    <g>
                                        <circle cx="5" cy="12" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-2 tagdiv">
                            <div>
                                <div class="text-ms"><span class="strong"> 479</span>&nbsp;followers
                                </div>
                                <div class="v-text">
                                    <a href="https://merchantface.com/tags/office-desk" class="text-a">#Office Desk</a>
                                </div>
                                <div class="d-flex">
                                    <div class="text-ms"><span>296</span>&nbsp;posts</div>
                                    <div class="text-ms ml-3"><span>121</span>&nbsp;pepoles</div>
                                </div>

                            </div>
                            <div class="ml-auto">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                                    style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                    <g>
                                        <circle cx="5" cy="12" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-2 tagdiv">
                            <div>
                                <div class="text-ms"><span class="strong"> 479</span>&nbsp;followers
                                </div>
                                <div class="v-text">
                                    <a href="https://merchantface.com/tags/office-desk" class="text-a">#Office Desk</a>
                                </div>
                                <div class="d-flex">
                                    <div class="text-ms"><span>296</span>&nbsp;posts</div>
                                    <div class="text-ms ml-3"><span>121</span>&nbsp;pepoles</div>
                                </div>

                            </div>
                            <div class="ml-auto">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                                    style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                    <g>
                                        <circle cx="5" cy="12" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-2 tagdiv">
                            <div>
                                <div class="text-ms"><span class="strong"> 479</span>&nbsp;followers
                                </div>
                                <div class="v-text">
                                    <a href="https://merchantface.com/tags/office-desk" class="text-a">#Office Desk</a>
                                </div>
                                <div class="d-flex">
                                    <div class="text-ms"><span>296</span>&nbsp;posts</div>
                                    <div class="text-ms ml-3"><span>121</span>&nbsp;pepoles</div>
                                </div>

                            </div>
                            <div class="ml-auto">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                                    style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                    <g>
                                        <circle cx="5" cy="12" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="card-footer  border-0 text-info">Show more...</div>
                    </div>

                </div>
                <div class="card border-0 rounded-4 mb-3 mt-3">
                    <div class="card-header   border-0 " style="font-size:1.25rem;font-weight: 700;">Who To Follow</div>
                    <div class="card-body p-2 border-0" style="background-color:#f8f9fc">
                        <div class="w-100 d-flex justify-content-between align-items-center gap-2 w-auto rounded-pill"
                            style="padding: 0.6rem">
                            <div class="d-flex flex-row gap-3">
                                <div>
                                    <img src="/img/avatar2.jpeg" alt="" class="rounded-pill"
                                        style="widh: 50px; height: 50px;">
                                </div>
                                <div class="rounded-pill d-flex flex-column">
                                    <a href="https://merchantface.com/tags/office-desk"
                                        class="fs-5 font-weight-bold text-decoration-none text-dark">Name</a>
                                    <p class="m-0 text-muted">@username</p>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-dark font-weight-bold rounded-pill">Follow</button>
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center gap-2 w-auto rounded-pill"
                            style="padding: 0.6rem">
                            <div class="d-flex flex-row gap-3">
                                <div>
                                    <img src="/img/avatar2.jpeg" alt="" class="rounded-pill"
                                        style="widh: 50px; height: 50px;">
                                </div>
                                <div class="rounded-pill d-flex flex-column">
                                    <a href="https://merchantface.com/tags/office-desk"
                                        class="fs-5 font-weight-bold text-decoration-none text-dark">Name</a>
                                    <p class="m-0 text-muted">@username</p>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-dark font-weight-bold rounded-pill">Follow</button>
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center gap-2 w-auto rounded-pill"
                            style="padding: 0.6rem">
                            <div class="d-flex flex-row gap-3">
                                <div>
                                    <img src="/img/avatar2.jpeg" alt="" class="rounded-pill"
                                        style="widh: 50px; height: 50px;">
                                </div>
                                <div class="rounded-pill d-flex flex-column">
                                    <a href="https://merchantface.com/tags/office-desk"
                                        class="fs-5 font-weight-bold text-decoration-none text-dark">Name</a>
                                    <p class="m-0 text-muted">@username</p>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-dark font-weight-bold rounded-pill">Follow</button>
                            </div>
                        </div>
                        <div class="card-footer  border-0 text-info">Show more...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
