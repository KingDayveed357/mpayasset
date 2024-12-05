<x-layout> 
<x-slot:heading>  
  Insight
</x-slot:heading>

<x-slot:calendar>  
          <a href="#calendar" class="back-btn" data-bs-toggle="modal">
            <i class="icon" data-feather="calendar"></i>
          </a>
</x-slot:calendar> 



    <!-- balance section starts -->
    <section>
      <div class="custom-container">
        <div class="statistics-banner">
          <div class="d-flex justify-content-center gap-3">
            <div class="statistics-content">
              <h5>Total Balance</h5>
              <h3 class="text-white fw-semibold">$ 1,06,786.65</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- balance statistics section end -->

    <!-- analytics-chart section starts -->
    <section>
      <div class="custom-container">
        <div class="chart">
          <div class="d-flex justify-content-between">
            <h3 class="fw-semibold dark-text">
              Analytics | <span class="light-text fw-normal">Mar- Jul</span>
            </h3>
            <ul class="listing">
              <li>W</li>
              <li class="active">M</li>
              <li>Y</li>
            </ul>
          </div>

          <div id="analytics-chart"></div>
        </div>
      </div>
    </section>
    <!-- analytics-chart section end -->

    <!-- wallet details section starts-->
    <section>
      <div class="wallet-details">
        <div class="amount w-50 text-center">
          <div class="d-flex align-items-center justify-content-center">
            <img
              class="img-fluid transaction-icon"
              src="assets/images/svg/income.svg"
              alt="down"
            />
            <h5>Income</h5>
          </div>
          <h3 class="dark-text fw-semibold">$ 15,256.33</h3>
        </div>
        <div class="amount w-50 text-center border-0">
          <div class="d-flex align-items-center justify-content-center">
            <img
              class="img-fluid transaction-icon"
              src="assets/images/svg/expense.svg"
              alt="up"
            />
            <h5>Expense</h5>
          </div>
          <h3 class="dark-text fw-semibold">$ 91,530.32</h3>
        </div>
      </div>
    </section>
    <!-- wallet details section end-->

    <!-- categories section starts -->
    <section>
      <div class="custom-container">
        <div class="title">
          <h2>Categories</h2>
        </div>

        <div class="chart mb-3">
          <div id="category-chart"></div>
        </div>

        <div class="row gy-3">
          <div class="col-12">
            <div class="transaction-box">
              <a
                href="#transaction-detail"
                data-bs-toggle="modal"
                class="d-flex gap-3"
              >
                <div class="categories-image color1">
                  <img
                    class="img-fluid transaction-icon"
                    src="assets/images/svg/16.svg"
                    alt="p16"
                  />
                </div>
                <div class="transaction-details">
                  <div class="transaction-name pb-0">
                    <h5>Shopping</h5>
                    <h5 class="dark-text fw-semibold">$15,000.10</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12">
            <div class="transaction-box">
              <a
                href="#transaction-detail"
                data-bs-toggle="modal"
                class="d-flex gap-3"
              >
                <div class="categories-image color2">
                  <img
                    class="img-fluid transaction-icon"
                    src="assets/images/svg/17.svg"
                    alt="p17"
                  />
                </div>
                <div class="transaction-details">
                  <div class="transaction-name pb-0">
                    <h5>Food</h5>
                    <h5 class="dark-text fw-semibold">$25,200.00</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12">
            <div class="transaction-box">
              <a
                href="#transaction-detail"
                data-bs-toggle="modal"
                class="d-flex gap-3"
              >
                <div class="categories-image color3">
                  <img
                    class="img-fluid transaction-icon"
                    src="assets/images/svg/18.svg"
                    alt="p18"
                  />
                </div>
                <div class="transaction-details">
                  <div class="transaction-name pb-0">
                    <h5>Health</h5>
                    <h5 class="dark-text fw-semibold">$5,000.03</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12">
            <div class="transaction-box">
              <a
                href="#transaction-detail"
                data-bs-toggle="modal"
                class="d-flex gap-3"
              >
                <div class="categories-image color4">
                  <img
                    class="img-fluid transaction-icon"
                    src="assets/images/svg/19.svg"
                    alt="p19"
                  />
                </div>
                <div class="transaction-details">
                  <div class="transaction-name pb-0">
                    <h5>Entertainment</h5>
                    <h5 class="dark-text fw-semibold">$7,053.00</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- categories section end -->

    <!-- transaction history section starts -->
    <section class="section-b-space">
      <div class="custom-container">
        <div class="title">
          <h2>Transaction History</h2>
        </div>

        <div class="row gy-3">
          <div class="col-12">
            <div class="transaction-box">
              <a
                href="#transaction-detail"
                data-bs-toggle="modal"
                class="d-flex gap-3"
              >
                <div class="transaction-image">
                  <img
                    class="img-fluid transaction-icon"
                    src="assets/images/svg/1.svg"
                    alt="p1"
                  />
                </div>
                <div class="transaction-details">
                  <div class="transaction-name">
                    <h5>Amazon prime</h5>
                    <h3 class="error-color">$199.<span>99</span></h3>
                  </div>
                  <div class="d-flex justify-content-between">
                    <h5 class="light-text">Subscription</h5>
                    <h5 class="light-text">8:45 am</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12">
            <div class="transaction-box">
              <a
                href="#transaction-detail"
                data-bs-toggle="modal"
                class="d-flex gap-3"
              >
                <div class="transaction-image">
                  <img
                    class="img-fluid transaction-icon"
                    src="assets/images/svg/2.svg"
                    alt="p2"
                  />
                </div>
                <div class="transaction-details">
                  <div class="transaction-name">
                    <h5>Apple store</h5>
                    <h3 class="success-color">$60.<span>30</span></h3>
                  </div>
                  <div class="d-flex justify-content-between">
                    <h5 class="light-text">Installment</h5>
                    <h5 class="light-text">9:00 pm</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12">
            <div class="transaction-box">
              <a
                href="#transaction-detail"
                data-bs-toggle="modal"
                class="d-flex gap-3"
              >
                <div class="transaction-image">
                  <img
                    class="img-fluid transaction-icon"
                    src="assets/images/svg/3.svg"
                    alt="p3"
                  />
                </div>
                <div class="transaction-details">
                  <div class="transaction-name">
                    <h5>Grocery shop</h5>
                    <h3 class="error-color">$55.<span>20</span></h3>
                  </div>
                  <div class="d-flex justify-content-between">
                    <h5 class="light-text">Purchase</h5>
                    <h5 class="light-text">3:45 pm</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- transaction history section end -->

   

    <!-- transaction detail modal start -->
    <div
      class="modal successful-modal transfer-details fade"
      id="transaction-detail"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Transaction Detail</h2>
          </div>
          <div class="modal-body">
            <ul class="details-list">
              <li>
                <h3 class="fw-normal dark-text">Payment status</h3>
                <h3 class="fw-normal light-text">Success</h3>
              </li>
              <li>
                <h3 class="fw-normal dark-text">Date</h3>
                <h3 class="fw-normal light-text">18 May, 2023</h3>
              </li>
              <li>
                <h3 class="fw-normal dark-text">From</h3>
                <h3 class="fw-normal light-text">**** **** **** 2563</h3>
              </li>
              <li>
                <h3 class="fw-normal dark-text">To</h3>
                <h3 class="fw-normal light-text">Amazon prime</h3>
              </li>
              <li>
                <h3 class="fw-normal dark-text">Transaction category</h3>
                <h3 class="fw-normal light-text">Bill Pay</h3>
              </li>
              <li class="amount">
                <h3 class="fw-normal dark-text">Amount</h3>
                <h3 class="fw-semibold error-color">$199.99</h3>
              </li>
            </ul>
          </div>
          <button type="button" class="btn close-btn" data-bs-dismiss="modal">
            <i class="icon" data-feather="x"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- successful transfer modal end -->

    <!-- calendar modal starts -->
    <div class="modal add-money-modal fade" id="calendar" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Select Custom Month</h2>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputstartmonth" class="form-label mb-2"
                >Start Month</label
              >
              <div class="d-flex gap-2">
                <select id="inputstartmonth" class="form-select">
                  <option selected="">Select start month</option>
                  <option>January</option>
                  <option>February</option>
                  <option>March</option>
                  <option>April</option>
                  <option>May</option>
                  <option>June</option>
                  <option>July</option>
                  <option>August</option>
                  <option>September</option>
                  <option>October</option>
                  <option>November</option>
                  <option>December</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputendmonth" class="form-label mb-2"
                >End Month</label
              >
              <div class="d-flex gap-2">
                <select id="inputendmonth" class="form-select">
                  <option selected="">Select start month</option>
                  <option>January</option>
                  <option>February</option>
                  <option>March</option>
                  <option>April</option>
                  <option>May</option>
                  <option>June</option>
                  <option>July</option>
                  <option>August</option>
                  <option>September</option>
                  <option>October</option>
                  <option>November</option>
                  <option>December</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputyear" class="form-label mb-2">Year</label>
              <div class="d-flex gap-2">
                <select id="inputyear" class="form-select">
                  <option selected="">Year</option>
                  <option>2011</option>
                  <option>2012</option>
                  <option>2013</option>
                  <option>2014</option>
                  <option>2015</option>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                  <option>2022</option>
                  <option>2023</option>
                </select>
              </div>
            </div>

            <a href="insight" class="btn theme-btn w-100">View details</a>
          </div>
          <button type="button" class="btn close-btn" data-bs-dismiss="modal">
            <i class="icon" data-feather="x"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- calendar modal end -->

  </x-layout>