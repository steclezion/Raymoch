@extends('layouts.app')
@section('stylesheets')

<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')

<div class="row">

    <!-- /.col -->
    <div class="col-md-8 offset-2">

        <form method="POST" action="{{ route('save_to_draft') }}">
            @csrf
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Query Issue Cover Letter</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">


                    <input type="hidden" value="{{ $template->id }}" name="hidden_template_id" />
                    <input type="hidden" value="{{ $dossier_evaluation_details->dossier_ass_id }}" name="hidden_dossier_asg_id" />
                    <div class="form-group" >
                        <textarea id="summernote" class="form-control" name='data' style="height: 300px; display: none;font-size: xx-large">
                            <div  id="name">

                                        <label>Date:</label>
                                        <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">
                                        @if (isset($date))
                                            {{ $date }}

                                        @else
                                        [Date/Month/Year]
                                        @endif
                                            </span>
                                        <br>
                                        <label>Ref:</label>
                                        <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">
                                                @if (isset($dossier_evaluation_details->dossier_ref_num))
                                                {{ $dossier_evaluation_details->dossier_ref_num }}

                                            @else
                                            [NMFA/XX/YEAR/Sequential Number]
                                            @endif
                                            </span>
                                        <br>
                                        <label>To:</label>
                                        <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">
                                                @if (isset($dossier_evaluation_details))
                                                {{ $dossier_evaluation_details->company_name }}<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[street/plot number]<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[region/state]<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[country]

                                            @else
                                            [Name of the applicant (marketing authorization holder)]<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[street/plot number]<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[region/state]<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[country]
                                            @endif



                                         </span>
                                        <br>

                                        <label>Subject: Queries to </label>
                                        <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">[name of the applicant/manufacturer] </span>
                                        <b>for the Registration Application of </b>
                                        <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191"> [name of the product, dosage form, strength] [Brand name] </span>
                                        <br>
                                        <br>
                                        &nbsp;&nbspDear Sir/Madam <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191"> [Name of the contact person] :</span>
                                        <br>
                                        <br>
                                        Reference is made to the application for registration dated
                                        <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191"> [date/month/year] :</span>
                                         of the following product:
                                         <table class='table-bordered ' width='100%'>
                                             <thead>
                                                 <th>S.No</th>
                                                 <th>Product Name</th>
                                                 <th>Application Number</th>
                                             </thead>
                                             <tbody>
                                                 <td>1</td>
                                                 <td><span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191"> [name of the product, dosage form, strength] [Brand name]</span></td>
                                                 <td><span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191"> [Application number]</span></td>
                                             </tbody>
                                         </table>
                                         <br>
                                         This is to kindly inform you that evaluation of
                                         <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191"> [name of the product, dosage form, strength] [Brand name]</span>
                                         has been completed. In this regard, we are attaching herewith the queries for your reference and to respond not later than
                                         <span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191"> [Month(text) date, year]. </span>
                                         Failure to respond by this date, the authority, at its discretion, will proceed to make a decision on the product for re-application of marketing authorization.
                                         <br>
                                         Best regards,
                                         <br>
                                         <br>
                                         Iyassu Bahta<br>
                                         Director, National Medicines and Food Administration<br>
                                         Ministry of Health<br>
                                         Asmara, Eritrea

                                <div style="page-break-after: always;"></div>

                                            <p class="MsoNormal" style="text-align:center" align="center"><b style="mso-bidi-font-weight:
                                                normal"><span style="font-size:14.0pt;line-height:107%;font-family:
                                                &quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">Queries to &lt;<span style="color:#2E74B5;mso-themecolor:
                                                accent1;mso-themeshade:191">Name of the manufacturer</span>&gt; for the
                                                Registration of &lt;<span style="color:#2E74B5;mso-themecolor:accent1;
                                                mso-themeshade:191">Product name, dosage form and strength</span>&gt;</span></b></p>

                                                <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">Upon
                                                evaluation of the dossier for the registration of <b style="mso-bidi-font-weight:
                                                normal">&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:
                                                191">Product name, dosage form and strength</span>&gt;</b>, the following
                                                queries have been raised. Therefore, please address the following questions
                                                with the respect to the submitted product dossier.</span></p>
                                                <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">Module
                                                        1</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">Section title</span>&gt;
                                                        (&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">Page
                                                        number</span>&gt;)</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">insert your
                                                        comments on the respective section of Module 1 here</span>&gt;</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">Module
                                                        2</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">Section title</span>&gt;
                                                        (&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">Page
                                                        number</span>&gt;)</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">insert your
                                                        comments on the respective section of Module 2 here</span>&gt;</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">Module
                                                        3</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">Section title</span>&gt;
                                                        (&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">Page
                                                        number</span>&gt;)</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">&lt;<span style="color:#2E74B5;mso-themecolor:accent1;mso-themeshade:191">insert your
                                                        comments on the respective section of Module 3 here</span>&gt;</span></p>

                                                        <p class="MsoNormal" style="text-align:justify"><i style="mso-bidi-font-style:
                                                        normal"><span style="font-size:10.0pt;line-height:107%;font-family:
                                                        &quot;Cambria&quot;,&quot;serif&quot;" lang="EN-US">&nbsp;</span></i></p>

</div>

                            </textarea>

                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="modal-footer justify-content-between">
                        <a class="btn btn-primary" href="/dossier_evaluation/edit/{{$dossier_evaluation_details->dossier_ass_id}}" >Back</a>
                        <button type="submit" class="btn btn-default"><i class="far fa-envelope"></i> Save To Draft </button>
                        <a onclick="test()" class="btn btn-primary"><i class="far fa-download"></i> Download  </a>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </form>

    </div>


    <!-- /.col -->
</div>
@endsection
@section('scripts')
<script src="{{asset('plugins/word_converter/printThis.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
    function test() {
            $('#name').printThis({
                header: "<img src='images/nmfa_header.png' alt='tst'/>",
                footer: "<img src='images/nmfa_footer.png' alt='tst'/>"

            });
        }

    $(function () {


        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })

    $('#reservationdate').datetimepicker({
        format: 'L'

    });


</script>
@endsection
