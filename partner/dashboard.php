<?php $title = 'Dashboard';
require_once __DIR__ . '/../partials/partner/sidebar.php'; ?><div class="page-wrapper"><?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?><div class="content">
        <div class="container container_partner content__container">
            <div class="content__main">
                <div class="dashboard">
                    <div class="dashboard__header" data-animated
                        <h1 class="dashboard__title">Dashboard</h1>
                        <p class="dashboard__subtitle"><?= date('M d, Y') ?></p>
                    </div>
                    <div class="dashboard__body">
                        <div class="simple-report" data-animated>
                            <div class="simple-report__item"><img alt="Pageviews" src="../shafy/img/icons/eye-group-primary.png" class="simple-report__img">
                                <div class="simple-report__item-body">
                                    <h2 class="simple-report__title">Pageviews</h2>
                                    <div class="simple-report__value simple-report__value_down">51.9K <span>19.3% <img alt="Down" src="../shafy/img/icons/arrow-right-down-primary-.png"></span></div>
                                </div>
                            </div>
                            <div class="simple-report__item"><img alt="Users" src="../shafy/img/icons/two-person-group-primary.png" class="simple-report__img">
                                <div class="simple-report__item-body">
                                    <h2 class="simple-report__title">Users</h2>
                                    <div class="simple-report__value">31.3K <span>2.5% <img alt="Up" src="../shafy/img/icons/arrow-right-up-green.png"></span></div>
                                </div>
                            </div>
                            <div class="simple-report__item"><img alt="Transactions" src="../shafy/img/icons/flame-group-primary.png" class="simple-report__img">
                                <div class="simple-report__item-body">
                                    <h2 class="simple-report__title">Transactions</h2>
                                    <div class="simple-report__value">7.0K <span>27.6% <img alt="Up" src="../shafy/img/icons/arrow-right-up-green.png"></span></div>
                                </div>
                            </div>
                            <div class="simple-report__item"><img alt="Ranking" src="../shafy/img/icons/activity-group-primary.png" class="simple-report__img">
                                <div class="simple-report__item-body">
                                    <h2 class="simple-report__title">Ranking</h2>
                                    <div class="simple-report__value">33.0 <span>17.9% <img alt="Up" src="../shafy/img/icons/arrow-right-up-green.png"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="pageviews-statistics" data-animated>
                            <h2 class="pageviews-statistics__title">Pageviews</h2>
                            <hr>
                            <div class="pageviews-statistics__body"><canvas id="pageviews-statistics"></canvas></div>
                        </div>
                    </div>
                </div>
            </div><?php require_once __DIR__ . '/../partials/partner/footer.php'; ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById("pageviews-statistics");

    const labels = [
        "JAN",
        "FEB",
        "MAR",
        "APR",
        "MAY",
        "JUN",
        "JUL",
        "AUG",
        "SEP",
        "OCT",
        "NOV",
        "DEC",
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: "Users",
            data: [
                2000, 2500, 1500, 1800, 2200, 2600, 2400, 2800,
                3200, 3800, 4100, 4600,
            ],
            borderColor: "#ff5108",
            borderWidth: 6,
            tension: 0.4,
            pointStyle: false,
        }, ],
    };

    new Chart(ctx, {
        type: "line",
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    usePointStyle: true,
                },
            },
            scales: {
                x: {
                    ticks: {
                        padding: 16,
                        color: "#8d8d91",
                        font: {
                            family: '"Nunito", sans-serif',
                            size: 14,
                        },
                    },
                    grid: {
                        color: "#e9e9e9",
                    },
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        padding: 16,
                        color: "#8d8d91",
                        font: {
                            family: '"Nunito", sans-serif',
                            size: 14,
                        },
                        callback: function(value, index, values) {
                            return (
                                Number((value / 1000).toString()) + "K"
                            );
                        },
                    },
                    border: {
                        display: false,
                    },
                    grid: {
                        display: false,
                    },
                },
            },
        },
    });
</script><?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>