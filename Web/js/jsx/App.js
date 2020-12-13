
class App extends React.Component{

    constructor(props) {
        super(props);
        this.props = {"title" : props.title};
    }
    render()
    {
        return <div>Hi {this.props.title}</div>;
    }
}

ReactDOM.render(<App title="Douglas Valdo"/>, document.getElementById("global-container"));