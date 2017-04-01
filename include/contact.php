<div class="container contact">
    <div class="row">
        <div class="contact_area">
            <h1><strong><u>Get In Touch</u></strong></h1>
            <p>Feel free to ask any questions via the contact form below.</p>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact_left">
                        <h1>Contact</h1>
                        <div class="media contact_media">
                            <i class="fa fa-phone"></i>
                            <div class="media-body contact_media_body">
                                <a href="tel:+918503836181">
                                    <h4>+91 85038 36181</h4>
                                </a>
                            </div>
                        </div>
                        <div class="media contact_media">
                            <i class="fa fa-envelope"></i>
                            <div class="media-body contact_media_body">
                                <a href="mailto:help@soulreviver.org">
                                    <h4>help@soulreviver.org</h4>
                                </a>
                            </div>
                        </div>
                        <div class="media contact_media">
                            <i class="fa fa-map-marker"></i>
                            <div class="media-body contact_media_body">
                                <h4>Udaipur, Rajasthan, India</h4>
                            </div>
                        </div>
                        <div class="contact_social">
                            <h1>Social</h1>
                            <a class="fb" href="https://www.facebook.com/soulreviverpsychologicalservices/"><i class="fa fa-facebook"></i></a>
                            <a class="twitter" href="https://twitter.com/soulreviverpsy"><i class="fa fa-twitter"></i></a>
                            <a class="gplus" href="https://plus.google.com/111146225292103167358"><i class="fa fa-google-plus"></i></a>
                            <a class="pinterest" href="https://www.instagram.com/soulreviver/"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact_right">
                        <form action="./?contact" method="post" enctype="multipart/form-data" class="footer_form">
                            <table>
                                <thead>
                                    <col width="50%">
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2"><input type="text" placeholder="Full Name *" name="name" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="email" placeholder="Email *" name="email" required></td>
                                        <td><input type="text" placeholder="Mobile Number *" name="mobile" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="Age" name="age"></td>
                                        <td>
                                            <select name="subject" required>
                                            <option disabled selected>Choose A Subject *</option>
                                            <option value="I Want To Share Something">I Want To Share Something</option>
                                            <option value="Depression">Depression</option>
                                            <option value="Stress">Stress</option>
                                            <option value="Anxiety Or Panic">Anxiety Or Panic</option>
                                            <option value="Relationship Related Issues">Relationship Related Issues</option>
                                            <option value="Adolescence Issues">Adolescence Issues</option>
                                            <option value="Teenager Issues">Teenager Issues</option>
                                            <option value="Career Related Issues">Career Related Issues</option>
                                            <option value="Education Related Issues">Education Related Issues</option>
                                            <option value="Parent Child Relationship Related Issues">Parent Child Relationship Related Issues</option>
                                            <option value="Drug Addiction Issues">Drug Addiction Issues</option>
                                            <option value="Fitness Related Issues">Fitness Related Issues</option>
                                            <option value="Oldage Rehabilitation Issues">Oldage Rehabilitation Issues</option>
                                            <option value="Workplace Related Issues">Workplace Related Issues</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><textarea rows="5" placeholder="Message *" name="message" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6>* Required Fields</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input class="contact_sendbtn" type="submit" value="Send" name="submit"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("include/mail.php");
    if(isset($_POST['submit']))
	{
		$contact_name=$_POST['name'];
		$contact_email=$_POST['email'];
        $contact_mobile=$_POST['mobile'];
        $contact_age=$_POST['age'];
        $contact_subject=$_POST['subject'];
        $contact_message=$_POST['message'];
        if($contact_name=='' OR $contact_email=='' OR $contact_mobile=='' OR $contact_subject=='' OR $contact_message=='')
		{
			echo "<script>alert('Please Fill All The Fields')</script>";
			exit();
		}
		else
		{
			mysqli_query($con,"insert into contact (contact_name,contact_email,contact_mobile,contact_age,contact_subject,contact_message) values ('$contact_name','$contact_email','$contact_mobile','$contact_age','$contact_subject','$contact_message')");
            send_to_contact($contact_name,$contact_email);
            send_to_admin($contact_name,$contact_email,$contact_mobile,$contact_age,$contact_subject,$contact_message);
            echo "<script>alert('Thank You, We Will Contact You Soon.')</script><script>window.open('./?contact','_self')</script>";
        }
    }
?>