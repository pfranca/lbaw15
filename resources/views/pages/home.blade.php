@extends('layouts.app')


@section('content')
  <div class="fluid">
    <div id="band" class="container-fluid bg-1">
      <div class="row text-center sct-main">
        <div class="col-md-12 tittle-section">
          <div class="col-md-12">
            <div class="tittle">Questions & Answers</div>
          </div>

          <div class="col-md-11 col-lg-8 col-xl-6 mx-auto">
            <div class="about">Our mission is to share and grow the world’s knowledge. A vast amount of the knowledge that would be valuable to many people is currently only available to a few — either locked in people’s heads, or only accessible to select groups. We want
              to connect the people who have knowledge to the people who need it, to bring together people with different perspectives so they can understand each other better, and to empower everyone to share their knowledge for the benefit of the rest
              of the world.</div>
          </div>
          <div class="col-md-12 btn-arrow">
            <a id="topics-btn" class="btn btn-circle js-scroll-trigger btn-arrow">
              <div class="about">
                <p>Our Topics</p>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>

    <!-- Container (THEMES Section) -->
    <div id="themes" class="bg-2">
      <div class="container-fluid bg-2 col-md-10">
        <div class="btn-bg2">
          <h3 class="text-center ">Q&A Topics</h3>
          <p class="text-center">This is what people are talking about!<br> Just take a moment and share knowladge!<br></p>
        </div>

        <div class="row row justify-content-center btn-bg2">


          <!-- footbal -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card mb-4">
              <div class="card-image text-center" onclick="window.location.href='topic.html'">
                <img class="card-img-top" src="img/1.jpg" alt="Guitar Player">
                <h5 class="card-title name-top text-dark font-weight-bold">Sports</h5>
              </div>
              <div class="card-body">
                <a href="" class="follow "><h5 class="text-center mx-auto">
                  Follow <i class="text-right far fa-heart"></i>
                </h5>
              </a>
              </div>
            </div>
          </div>
          <!-- music -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card mb-4">
              <div class="card-image text-center" onclick="window.location.href='topic'">
                <img class="card-img-top" src="img/2.jpeg" alt="Guitar Player">
                <h5 class="card-title name-top text-dark font-weight-bold">Music</h5>
              </div>
              <div class="card-body">
                <a href="" class="follow "><h5 class="text-center mx-auto">
                  Follow <i class="text-right far fa-heart"></i>
                </h5>
              </a>
              </div>
            </div>
          </div>
          <!-- fashion -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card mb-4">
              <div class="card-image text-center" onclick="window.location.href='topic'">
                <img class="card-img-top" src="img/3.jpeg" alt="Fashion Shot">
                <h5 class="card-title name-top  text-dark font-weight-bold">Fashion</h5>
              </div>
              <div class="card-body">
                <a href="" class="follow "><h5 class="text-center mx-auto">
                  Follow <i class="text-right far fa-heart"></i>
                </h5>
              </a>
              </div>
            </div>
          </div>

          <!-- footbal -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card mb-4">
              <div class="card-image text-center" onclick="window.location.href='topic'">
                <img class="card-img-top" src="img/4.jpg" alt="coding">
                <h5 class="card-title name-top  text-dark font-weight-bold">IT & Coding</h5>
              </div>
              <div class="card-body">
                <a href="" class="follow "><h5 class="text-center mx-auto">
                  Follow <i class="text-right far fa-heart"></i>
                </h5>
              </a>
              </div>
            </div>
          </div>
          <!-- music -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card mb-4">
              <div class="card-image text-center" onclick="window.location.href='topic'">
                <img class="card-img-top" src="img/5.jpg" alt="mathnscience">
                <h5 class="card-title name-top text-dark font-weight-bold">Math & Science</h5>
              </div>
              <div class="card-body">
                <a href="" class="follow "><h5 class="text-center mx-auto">
                  Follow <i class="text-right far fa-heart"></i>
                </h5>
              </a>
              </div>
            </div>
          </div>
          <!-- fashion -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card mb-4">
              <div class="card-image text-center" onclick="window.location.href='topic'">
                <img class="card-img-top" src="img/6.jpg" alt="food">
                <h5 class="card-title name-top  text-dark font-weight-bold">Food & Nutricion</h5>
              </div>
              <div class="card-body">
                <a href="" class="follow "><h5 class="text-center mx-auto">
                  Follow <i class="text-right far fa-heart"></i>
                </h5>
              </a>
              </div>
            </div>
          </div>
          <!-- music -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card mb-4">
              <div class="card-image text-center" onclick="window.location.href='topic'">
                <img class="card-img-top" src="img/7.jpg" alt="history">
                <h5 class="card-title name-top text-dark font-weight-bold">History</h5>
              </div>
              <div class="card-body">
                <a href="" class="follow ">
                  <h5 class="text-center mx-auto">Follow<i class="text-right far fa-heart"></i>
                  </h5>
                </a>
              </div>
            </div>
          </div>
          <!-- fashion -->
          <div class="col-sm-12 col-md-4 col-lg-3">
            <div class="card mb-4">
              <div class="card-image text-center" onclick="window.location.href='topic'">
                <img class="card-img-top" src="img/8.png" alt="random">
                <h5 class="card-title name-top  text-dark font-weight-bold">Random</h5>
              </div>
              <div class="card-body">
                <a href="" class="follow "><h5 class="text-center mx-auto">
                  Follow <i class="text-right far fa-heart"></i>
                </h5>
              </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
