<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'title'      => 'The Three Levels of Self-Awareness',
                'content'    => 'The fact is that the majority of our thoughts and actions are on autopilot. This isn’t necessarily a bad thing either. Our habits, routines, impulses, and reactions carry us through our lives so we don’t have to stop and think about it every time we wipe our ass or start a car. The problem is when we’re on autopilot for so long that we forget we’re on autopilot. Because when we’re not even aware of our own habits, routines, impulses, and reactions, then we no longer control them—they control us. Whereas a person with self-awareness is able to exercise a little meta-cognition and say, “Hmm… every time my sister calls me and asks for money, I end up drinking a lot of vodka. That might not be a coincidence,” a person without self-awareness just hits the bottle and doesn’t look back.',
                'user_id'    => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title'      => '4 Ways My Views Have Changed',
                'content'    => 'This past month, I went back and reread the book Debt: The First 5,000 Years by David Graeber. The first time I read the book was back in 2013 and, ever since, I’ve largely considered it one of my favorite books on economics, the history of finance and political history. It changed how I thought about money, government and business. Yet, this time, I struggled to get through it. Sections I thought were thoroughly researched, I now found to be somewhat myopic and one-sided. Arguments that once convinced me now merely triggered skepticism. Don’t get me wrong, it’s still a great read and full of fascinating information. But whereas the first time I read it felt like it was showing me all the many ways in which I was wrong, this time I couldn’t help but notice all of the many places where it was potentially wrong.',
                'user_id'    => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title'      => 'Managing Your Mental Health',
                'content'    => 'For the vast majority of modern medical history, “health” was basically defined as the absence of disease. If you weren’t sick, you were healthy. Mental health was treated the same way: if you weren’t a crazy loon, then you were considered mentally healthy. But as medicine and psychology advanced, it became clear that our mental health included a wider range of emotional and social factors that don’t necessarily have much to do with mental illness. Mental health became more closely associated with well-being across all domains of our lives—both personally (psychological, emotional, cognitive, etc.) and interpersonally (community and family, romantic relationships, professional fulfillment, etc.). Our mental health affects our everyday lives, influencing how we respond to stress, how we make decisions, how we interact with others, our sense of fulfillment and purpose in the world, and on and on. It’s important, then, that we take a step back and really think about our mental health in holistic terms like this, not just as a lack of mental disorder.',
                'user_id'    => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        Post::insert($post);
    }
}
