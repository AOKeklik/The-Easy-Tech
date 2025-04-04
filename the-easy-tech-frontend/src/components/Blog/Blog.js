import BlogItem from './BlogItem/BlogItem'

const Blog = ({excluding=null,data,limit=3}) => {
    const filtered = data?.data?.filter(post => post.id != excluding)

    return filtered && filtered.length > 0 && <section className='list-blog three-col lg:mt-[100px] sm:mt-16 mt-10 pb-[100px]'>
        <div className='container'>
            <h3 className='heading3 text-center'>Latest News</h3>
            <div className='list grid lg:grid-cols-3 sm:grid-cols-2 gap-8 md:mt-10 mt-6'>
                {
                    filtered.slice(0,limit).map((post,i) => <BlogItem key={i} {...{post}} />)
                }              
            </div>
        </div>
    </section>
}

export default Blog;