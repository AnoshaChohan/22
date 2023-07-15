@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="header">
            <div class="centered-header">GC Portfolio Manager</div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header centered-text">Enter Gold Transaction</div>

                <div class="card-body">
                    <div class="body-header">
                        <div class="list">
                            <div class="item">
                                <span class="header">Date:</span>
                                <input type="date" class="text-input" placeholder="Select date"></input>
                            </div>
                            <div class="item">
                                <span class="header">QM sell:</span>
                                <input type="text" class="text-input" placeholder="QM sell value"></input>
                            </div>
                            <div class="item">
                                <span class="header">FX:</span>
                                <input type="text" class="text-input" placeholder="FX value"></input>
                            </div>
                            <div class="item">
                                <span class="header">Downpayment:</span>
                                <input type="text" class="text-input" placeholder="Downpayment value"></input>
                            </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="table-container">
                <table class="centered-table">


                    <thead>

                        <tr>
                        <th></th>
                        <th colspan="4">Transaction History Details</th>
                        <th colspan="5">Expected Terminated Transaction History Details</th>
                        <th colspan="2">Action</th>
                        </tr>

                        <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>QM Sell (RM/g)</th>
                        <th>FX</th>
                        <th>Downpayment</th>
                        <th>Downpayment</th>
                        <th>Termination Date</th>
                        <th>FX</th>
                        <th>QM Buy (RM/g)</th>
                        <th>Profit / Loss</th>
                        <th>Projection</th>
                        <th>Terminate</th>
                        </tr>

                    </thead>


                    <tbody>
                       <tr>
                        </tr>

                        
                    </tbody>
                </table>    
            </div>
 
        </div>
        
    </div>

</div>

@endsection