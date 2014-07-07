package com.virtualis.exp;

import android.app.Activity;
import android.app.FragmentManager;
import android.app.FragmentTransaction;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.TextView;

import com.virtualis.R;

public class Videos extends Activity implements OnClickListener{
	
	int cardRest;
	String userRest;
	
	
	int currentVideoNo = 0,total_videos = 0;//next_video = 1,prev_video = 1,total_videos  = 0;
	
	FragmentManager fragmentManager ;
	FragmentTransaction fragmentTransaction;
	
	private Button btn1,btn2;
	String VideoUrls;
	String[] Urls = null;
	int no_vid = 0;
	TextView label;
	
	Videos vd;
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.one_videos);
		
		vd = this;
		
		VideoUrls = getIntent().getExtras().getString("video_urls");
		Urls = VideoUrls.split(",");
		total_videos = Urls.length;
		
		label = (TextView) findViewById(R.id.video_no);
		label.setText("Video 1 / "+ total_videos);
		
		fragmentManager = getFragmentManager();
		fragmentTransaction = fragmentManager.beginTransaction();
		Video_Frag currentVideo = new Video_Frag(Urls[currentVideoNo]);
		fragmentTransaction.add(R.id.fragment, currentVideo);
		//fragmentTransaction.addToBackStack(null);
        fragmentTransaction.commit();
        
		
		btn1 = (Button) findViewById(R.id.prev_btn);
		btn2 = (Button) findViewById(R.id.next_btn);
		
		btn1.setEnabled(false);
		btn2.setEnabled((currentVideoNo+1)<total_videos);		
		
		btn1.setOnClickListener(this);
		btn2.setOnClickListener(this);

	}
	
	@Override
	public void onClick(View v) {
		// TODO Auto-generated method stub
		switch(v.getId()){
			case R.id.next_btn:
				currentVideoNo++;
				break;
			case R.id.prev_btn:
				currentVideoNo--;
				break;
		}
		
		btn1.setEnabled(currentVideoNo>0);
		btn2.setEnabled((currentVideoNo+1)<total_videos);
		
		Video_Frag nextVideo = new Video_Frag(Urls[currentVideoNo]);
		label.setText("Video : "+(currentVideoNo+1)+" / " + total_videos);
		fragmentTransaction = fragmentManager.beginTransaction();
		fragmentTransaction.replace(R.id.fragment, nextVideo);
		//fragmentTransaction.addToBackStack(null);
        fragmentTransaction.commit();
		
	}

	@Override
	public void onBackPressed() {
		// TODO Auto-generated method stub
		vd.finish();
		super.onBackPressed();
	}
	
	

}

