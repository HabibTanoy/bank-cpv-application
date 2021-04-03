<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Application Form</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <style>
      /* body{
        line-height:7px;
      } */
     .file-style {
      border-style: dotted solid;
      border-top:0px;
      border-left:0px;
      border-right:0px;
      width:60%;
    }
    .border-style {
      border-bottom: 1px dotted black;
      width:100%;
    }
    .application_tag {
    text-align: center;
    font-size:2rem;
    font-weight: bold;
    text-transform: uppercase;
    padding-top: 0px;
    /* padding-top: rem; */
}

.application_merge {
    margin-left: 1rem;
    margin-right: 1rem;
    /* line-height:7px; */
}
.name_tag {
    font-size: 16px;
}

.cpv {
    font-weight:bold;
    text-transform:uppercase;
    font-size:.8rem;
    margin-bottom:.5rem;
    line-height:1.2;
    color:inherit;
    margin-top:0;
    /* border: 1px solid black; */
    width:70%
}

.app_info {
    margin-top:28px;
    font-size: 1rem;
    font-weight: bold;
}
.tag_info {
    /* margin-top:-17px; */
    font-size: 1rem;
    font-weight: bold;
}
.input-field {
  float: right;
  /* margin-top:-25px; */
  width:35%;
  /* border: 1px solid black; */
}
.fileno-field {
  float: right;
  margin-top:-25px;
  width:35%;
  /* border: 1px solid black; */
}

.name_field {
  float: right;
  margin-top:-25px;
  width:20%;
}
.border-debug{
  border:1px solid red;
}
div{
  width:100%;
}
.font_tag {
  font-size:23px;
  
}
.font-guarantor {
  font-size:30px
}

    </style>
  </head>
  <body>
  <h2 class="application_tag">Application Form</h2>
    <div class="application_merge">
          <p class="cpv">contact point verification (cpv) form - (for source use)</p>
          <div class="fileno-field">File No: <input type="text" class="file-style" value="{{$applicants_data->application_id}}"></div>
      <div>
        <p class="app_info">Applicant's Information:</p>
      </div>
      <table style="width:100%;">
        <tr>
          <td style="width:30%">
            <div class="">
            <p class="name_tag">Name:</p>
            </div>
          </td>
          <td style="100%">
          <div class="border-style">
            <div type="text" class="border-style">{{$applicants_data->name}}</div>
          </div>
          </td>
          <td rowspan="7" class="" style="text-align:right">
            <img src="{{$applicants_data->applicant_image}}" width="25%" height="170px" alt="BTS"> 
          </td>
        </tr>
        <tr >
          <td style="width:30%">
            <div class="">
            <p class="name_tag">Present Address:</p>
          </td>
          <td class=''>
          <div>
          <div type="text" class="border-style">{{$applicants_data->present_address}}</div>
          </div>
          </td>
        </tr>
        <tr >
          <td style="width:30%">
            <div class="">
            <p class="name_tag">Office/Company Name:</p>
          </td>
          <td class=''>
          <div>
            <div type="text" class="border-style">{{$applicants_data->office_business_name}}</div>
          </div>
          </td>
        </tr>
        <tr >
          <td style="width:30%">
            <div class="">
            <p class="name_tag">Designation:</p>
          </td>
          <td class=''>
          <div>
          <div type="text" class="border-style">{{$applicants_data->designation}}</div>
          </div>
          </td>
        </tr>
        <tr >
          <td style="width:30%">
            <div class="">
            <p class="name_tag">Business/Office Address:</p>
          </td>
          <td class=''>
          <div>
          <div type="text" class="border-style">{{$applicants_data->office_business_address}}</div>
          </div>
          </td>
        </tr>
      </table>
    </div>
       <!--End of applicants-->
       <div class="application_merge">
       <div class="tag_info">
        <p>Co-applicant's Information: (For Loan Application Only)</p>
      </div>
      <table style="width:100%">
        <tr>
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Name:</p>
            </div>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr>
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Present Address:</p>
            </div>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Office/Company Name:</p>
            </div>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Designation:</p>
            </div>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:45%; height:50px;">
            <div class="font_tag">
            <p class="">Business/Office Address:</p>
            </div>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
      </table>
    </div>
       </div>
       <!--For Co-applicant's only-->
       <div class="application_merge">
       <div class="tag_info">
        <p>1st Guarantor's Information: (For Loan Application Only)</p>
      </div>
      <table style="width:100%">
        <tr>
          <td style="width:30%; height:50px;">
            <div class="font_tag">
            <p class="">Name:</p>
          </td>
          <td class='border-style font_tag'>
          <div type="text">{{ count($guarantor_data) > 0 ? $guarantor_data[0]->nid_name : "" }} </div>
          </td>
          @if($guarantor_data[0]->guarantor_image)
            <td rowspan="7" style="text-align:right">
              <img src="{{$guarantor_data[0]->guarantor_image}}" width="40%" height="250px" alt="BTS"> 
            </td>
           @else 
           <p hidden>test</p>
          @endif
        </tr>
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Present Address:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Office/Company Name:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Designation:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:45%; height:50px;">
            <div class="font_tag">
            <p class="">Business/Office Address:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
      </table>
    </div>
       <!--1st guarantor-->
       <div class="application_merge">
       <div class="tag_info">
        <p>2nd Guarantor's Information's Information: (For Loan Application Only)</p>
      </div>
      <table style="width:100%">
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Name:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Present Address:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""><div>
          </td>
        </tr>
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Office/Company Name:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:40%; height:50px;">
            <div class="font_tag">
            <p class="">Designation:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
        <tr >
          <td style="width:45%; height:50px;">
            <div class="font_tag">
            <p class="">Business/Office Address:</p>
          </td>
          <td class='border-style'>
          <div type="text" class=""></div>
          </td>
        </tr>
      </table>
    </div>
       </div>
       <!--2nd guarantor-->
  </body>
</html>
