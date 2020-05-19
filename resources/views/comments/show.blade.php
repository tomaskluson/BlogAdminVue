<comment :comment-data="{{ $comment }}" inline-template>

    {{-- <article class="comment" @click="visible = false" v-show="visible"> --}}
    <article class="comment">
       
        <div 
            ref="input"
            class="content" 
            {{-- @dblclick="editing = true" --}}
            {{-- @blur="updateComment" --}}
            :contenteditable="editing"
            @input="textChange"
            @keydown.enter="updateComment"    
            @keydown.esc="resetText"
            @blur="resetText"
        >
            {{ $comment->text }}
        </div>
        <footer class="meta">
            
            <a href="/users/{{ $comment->user->id }}" class="author">
                @<strong>{{ $comment->user->name }}</strong>
            </a>
            
            <time datetime="{{ $comment->created_at->toW3cString() }}" class="has-text-grey">
                {{ $comment->created_at->diffForHumans() }}
            </time>

            {{-- @if ( $comment->user_id == auth()->id() ) --}}
            @can('update', $comment)
                <span class="controls has-text-grey">
                    <a class="edit" @click="startEditing">edit</a>
                    {{-- <a class="delete" @click="deleteComment">x</a> --}}
                    <a class="delete" @click="deleteComment">x</a>
                </span>
            @endcan

            </footer>
    </article>

</comment>