package com.example.createmundi;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    private Button BotaoAdm, BotaoUser;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        BotaoUser = (Button) findViewById(R.id.VisualizarUsuario);
        BotaoUser.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AbrirUser();
            }
        });

        BotaoAdm = (Button) findViewById(R.id.CriarAdministrador);
        BotaoAdm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AbrirAdm();
            }
        });
    }

    public void AbrirAdm() {
        Intent intent = new Intent(this, AdmActivity.class);
        startActivity(intent);
    }

    public void AbrirUser() {
        Intent intent = new Intent(this, UserActivity.class);
        startActivity(intent);
    }
}