<thead>
                    <tr>
                        <th>Si.No</th>
                        <th>Factory Name</th>
                        <th>Company Name</th>
                        <th>Factory Type</th>
                        <th>Division</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($factorys as $factory)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$factory->factory_name}}</td>
                        <td>{{$factory->company_title}}</td>
                        <td>{{$factory->type_title}}</td>
                        <td>{{$factory->division_title}}</td>
                        <td>{{$factory->factory_contact_number}}</td>
                        <td>{{$factory->factory_address}}</td>
                        <td style="text-align: center;">
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Si.No</th>
                        <th>Factory Name</th>
                        <th>Company Name</th>
                        <th>Factory Type</th>
                        <th>Division</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </tfoot>