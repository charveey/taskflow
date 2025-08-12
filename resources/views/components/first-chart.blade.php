@props(['project'])

<div x-data="chart()" x-init="initChart()" class="w-full min-h-44 p-2.5 border border-gray-300 shadow-sm bg-white dark:border-none dark:bg-neutral-900 rounded-md">
    <canvas id="first_chart" height="176px"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    function chart() {
        return {
            chart: null,
            project_id: {{$project->id}},
            data: null,
            async initChart() {
                await axios.get(`/projects/${this.project_id}/chart-data`) // replace 1 with your project ID
                    .then(res => this.data = res.data.tasks)
                    .catch(errs => console.log(errs))

                    this.chart = new Chart(
                        document.getElementById('first_chart'),
                        {
                            type: 'bar',
                            data: {
                                labels: this.data.map(row => row.user.name.split(' ')[0]),
                                datasets: [{
                                    label: 'Number Of Tasks Assigned To Users',
                                    data: this.data.map(row => row.total),
                                    borderColor: 'rgb(0, 80, 239, 1)',
                                    backgroundColor: 'rgb(0, 80, 239, 0.2)',
                                    borderWidth: 1,
                                    borderRadius: 5,
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    tooltip: {
                                        backgroundColor: '#333',
                                        titleColor: '#fff',
                                        bodyColor: '#ddd',
                                        borderWidth: 1,
                                        borderColor: '#444'
                                    }
                                },
                                scales: {
                                    y: {
                                        ticks: {
                                            stepSize: 1,
                                        }
                                    }
                                }
                            }
                        }
                    );
            }
        }
    }
 
</script>